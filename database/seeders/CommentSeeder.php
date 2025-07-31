<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\User;
use App\Models\News;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil semua user dan news yang sudah ada
        $users = User::all();
        $news = News::all();

        if ($users->isEmpty() || $news->isEmpty()) {
            $this->command->warn('Pastikan User dan News seeder sudah dijalankan terlebih dahulu!');
            return;
        }

        $this->command->info('Membuat komentar utama...');

        // Buat 200 komentar utama (parent comments)
        $parentComments = [];
        for ($i = 0; $i < 200; $i++) {
            $comment = Comment::create([
                'user_id' => $users->random()->id,
                'news_id' => $news->random()->id,
                'content' => $this->getRandomComment(),
                'parent_comment_id' => null,
                'is_active' => fake()->boolean(95), // 95% aktif
                'created_at' => fake()->dateTimeBetween('-6 months', 'now'),
            ]);

            $comment->updated_at = fake()->dateTimeBetween($comment->created_at, 'now');
            $comment->save();

            // Simpan komentar aktif untuk dijadikan parent
            if ($comment->is_active) {
                $parentComments[] = $comment;
            }
        }

        $this->command->info('Membuat reply komentar...');

        // Buat 100 reply comments dari komentar yang aktif
        for ($i = 0; $i < 100; $i++) {
            if (!empty($parentComments)) {
                $parentComment = collect($parentComments)->random();

                $reply = Comment::create([
                    'user_id' => $users->random()->id,
                    'news_id' => $parentComment->news_id, // Harus sama dengan parent
                    'content' => $this->getRandomReply(),
                    'parent_comment_id' => $parentComment->id,
                    'is_active' => fake()->boolean(98), // Reply lebih jarang di-moderate
                    'created_at' => fake()->dateTimeBetween($parentComment->created_at, 'now'),
                ]);

                $reply->updated_at = fake()->dateTimeBetween($reply->created_at, 'now');
                $reply->save();
            }
        }

        // Buat beberapa nested reply (reply dari reply)
        $this->command->info('Membuat nested reply...');

        $replies = Comment::whereNotNull('parent_comment_id')->where('is_active', true)->get();
        for ($i = 0; $i < 30; $i++) {
            if ($replies->isNotEmpty()) {
                $parentReply = $replies->random();

                Comment::create([
                    'user_id' => $users->random()->id,
                    'news_id' => $parentReply->news_id,
                    'content' => $this->getRandomNestedReply(),
                    'parent_comment_id' => $parentReply->id,
                    'is_active' => fake()->boolean(99),
                    'created_at' => fake()->dateTimeBetween($parentReply->created_at, 'now'),
                ]);
            }
        }

        $this->command->info('Seeder komentar selesai!');
        $this->command->info('Total komentar: ' . Comment::count());
        $this->command->info('Komentar aktif: ' . Comment::where('is_active', true)->count());
        $this->command->info('Komentar utama: ' . Comment::whereNull('parent_comment_id')->count());
        $this->command->info('Reply komentar: ' . Comment::whereNotNull('parent_comment_id')->count());
    }

    /**
     * Generate random comment content
     */
    private function getRandomComment(): string
    {
        $comments = [
            'Artikel yang sangat menarik dan informatif!',
            'Terima kasih atas informasinya, sangat bermanfaat.',
            'Saya setuju dengan pendapat yang disampaikan dalam berita ini.',
            'Wah, ini berita penting yang perlu diketahui banyak orang.',
            'Semoga informasi ini bisa membantu masyarakat luas.',
            'Bagus sekali artikelnya, mudah dipahami dan lengkap.',
            'Ini adalah isu yang memang perlu mendapat perhatian serius.',
            'Reportasenya cukup objektif dan berimbang.',
            'Saya harap ada tindak lanjut dari berita ini.',
            'Informasi yang sangat relevan dengan kondisi saat ini.',
            'Tulisan yang bagus, terima kasih telah berbagi.',
            'Saya baru tahu informasi ini, thanks for sharing!',
            'Artikel ini memberikan perspektif baru yang menarik.',
            'Semoga pihak terkait segera mengambil tindakan.',
            'Berita yang perlu disebarkan ke lebih banyak orang.',
            'Sangat informatif dan mudah dicerna.',
            'Ini topik yang sedang hangat dibicarakan memang.',
            'Reportase yang cukup mendalam dan komprehensif.',
            'Saya appreciate jurnalisme berkualitas seperti ini.',
            'Semoga situasinya bisa segera membaik.',
        ];

        return fake()->randomElement($comments);
    }

    /**
     * Generate random reply content
     */
    private function getRandomReply(): string
    {
        $replies = [
            'Saya sependapat dengan komentar Anda.',
            'Benar sekali, saya juga merasakan hal yang sama.',
            'Terima kasih sudah menambahkan perspektif baru.',
            'Setuju banget dengan pendapat ini.',
            'Saya punya pengalaman serupa dengan yang Anda sampaikan.',
            'Thanks for sharing your thoughts!',
            'Saya kurang setuju dengan pendapat ini, menurut saya...',
            'Bisa dijelaskan lebih detail tidak?',
            'Bagaimana menurut Anda tentang aspek lainnya?',
            'Saya rasa ada yang perlu ditambahkan juga.',
            'Pengalaman saya sedikit berbeda sih.',
            'Menarik juga sudut pandang yang Anda berikan.',
            'Saya belum pernah melihat dari sisi itu.',
            'Good point! Saya baru sadar hal itu.',
            'Betul, ini memang perlu dipertimbangkan matang-matang.',
        ];

        return fake()->randomElement($replies);
    }

    /**
     * Generate random nested reply content
     */
    private function getRandomNestedReply(): string
    {
        $nestedReplies = [
            'Iya betul, saya juga setuju dengan pendapat kalian.',
            'Diskusi yang menarik, terima kasih sudah berbagi.',
            'Saya belajar banyak dari thread diskusi ini.',
            'Thanks for the discussion, very insightful!',
            'Saya jadi punya pemahaman baru tentang topik ini.',
            'Diskusinya bagus, semoga bisa berlanjut.',
            'Senang bisa ikut berdiskusi dengan kalian.',
            'Thread yang sangat informatif dan berbobot.',
            'Saya appreciate diskusi yang berkualitas seperti ini.',
            'Terima kasih sudah memperkaya diskusi ini.',
        ];

        return fake()->randomElement($nestedReplies);
    }
}
