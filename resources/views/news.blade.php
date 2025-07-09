@php
    $numofDiscussions = 200;
    $authors = ['John Doe', 'Jane Smith', 'Alex Johnson'];
    $totalAuthors = count($authors);
    $text = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vel risus suscipit, hendrerit magna id, pretium erat. Morbi venenatis dui sit amet enim efficitur, at euismod quam bibendum. Donec convallis diam quis dolor aliquam, ut convallis orci lobortis. Praesent lacus purus, elementum ut consequat non, blandit quis quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer id malesuada diam, in ultrices arcu. Suspendisse vel odio in nunc auctor laoreet. Maecenas purus eros, blandit quis augue non, finibus laoreet orci. Mauris nec tortor at lorem venenatis mattis eget non justo. Nullam scelerisque nec nisl quis maximus. Quisque maximus urna sit amet erat venenatis, eu aliquam nisi condimentum. Fusce eu leo nec ex auctor tempor vel eu ante. Vivamus et ante mollis, ullamcorper libero vel, aliquam sem. Vivamus at mollis nulla.

    Donec quis pretium lacus. Nulla eu auctor ex. Phasellus dolor nulla, placerat id pretium et, posuere at eros. Mauris eu purus ullamcorper, tempus risus a, cursus lorem. In lorem nisi, fermentum non congue eget, pulvinar nec tellus. Morbi libero elit, sagittis nec pulvinar in, dignissim vel nisl. Morbi massa orci, convallis sed pretium a, volutpat id lorem. Aenean euismod finibus metus et suscipit. Phasellus eu velit id urna pulvinar vulputate cursus convallis magna. Mauris efficitur consectetur vulputate. Morbi aliquam tellus metus, a commodo magna maximus in.

    Etiam felis sapien, tincidunt sit amet velit sed, volutpat interdum felis. Maecenas semper odio in molestie pulvinar. Cras semper, odio vel euismod imperdiet, libero neque auctor erat, eu vehicula velit purus eu nisl. Maecenas sodales ultrices tortor, sit amet dapibus nulla egestas non. Vivamus convallis dolor nec metus tincidunt, quis finibus dolor gravida. Fusce ullamcorper arcu sed justo mollis tempus. Pellentesque nec gravida neque. Quisque hendrerit cursus tristique. Fusce rutrum diam at eros pellentesque, ac tempor ipsum feugiat. Vivamus fringilla imperdiet libero placerat sollicitudin. Curabitur cursus dolor a scelerisque imperdiet. Phasellus condimentum id mi a sagittis. Maecenas vitae risus mi.

    Nam ultricies tellus in dolor luctus, a gravida justo aliquam. Nam nec purus mattis, scelerisque lacus vel, efficitur nisi. Mauris at porttitor eros. Aliquam posuere aliquet velit a imperdiet. Integer euismod id massa sit amet consequat. Sed condimentum turpis quis volutpat varius. Nulla dolor augue, sagittis viverra vulputate a, congue a eros. Phasellus faucibus mollis tellus non dignissim. Etiam porta quam nec pulvinar mollis.

    Nunc lacus odio, eleifend viverra velit eget, maximus pulvinar turpis. Praesent quis viverra diam. Donec massa arcu, mollis dapibus augue eu, venenatis pharetra enim. Ut sed elit urna. Proin vehicula mollis felis sagittis consectetur. Morbi sodales, est sed auctor suscipit, sapien erat luctus quam, id rhoncus nunc orci sed erat. Mauris odio purus, dignissim quis tortor vel, euismod suscipit dui. Sed interdum elit neque, ac laoreet justo tristique vel."
@endphp

<x-layouts.app :title="__('News')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="relative aspect-video w-full overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <img src="images/news2.jpeg" alt="Deskripsi Gambar" class="w-full h-full" />
        </div>
        <div class="flex justify-center w-full">
            <div class="relative w-full md:w-2/3 rounded-xl">
                <flux:button class="mb-4" href="{{ route('category', ['category' => 'economy']) }}" variant="primary">Economy</flux:button>
                <h2 class="text-4xl font-bold">News Smartphone Features Unveiled at Tech Conferences</h2>
                <p class="mb-4 font-semibold text-2xl text-zinc-600 dark:text-zinc-400">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eligendi natus quo pariatur voluptate doloremque ipsam, blanditiis enim deserunt accusantium aperiam harum fugiat adipisci, recusandae quasi dicta nisi nostrum odit aspernatur!</p>
                <flux:text class="mb-2" size="lg">
                    By
                    @foreach ($authors as $index => $author)
                        <flux:link href="#" >{{ $author }}</flux:link>@if ($index < $totalAuthors - 2), @elseif ($index == $totalAuthors - 2) and @endif
                    @endforeach
                </flux:text>
                <flux:text class="mb-6" size="lg" variant="subtle">May, 03 2025 at 22.51 PM</flux:text>

                <div class="[&>p]:mb-6">
                    <p class="md:text-lg">
                        @foreach (explode("\n", $text) as $paragraph)
                            <span class="block mb-4">{{ $paragraph }}</span>
                        @endforeach
                    </p>
                </div>
            </div>
        </div>

        {{-- <flux:separator></flux:separator>
        <section class="py-4 antialiased">
            <div class="flex justify-center w-full">
                <div class="relative w-full md:w-2/3 rounded-xl">
                    <flux:heading size="xl" class="mb-4">Discussions ({{ $numofDiscussions }})</flux:heading>
                    <form class="mb-6">
                        <flux:textarea class="mb-4" rows="auto"
                            placeholder="Write a comment..."
                        />
                        <flux:button>
                            Post comment
                        </flux:button>
                    </form>

                </div>
            </div>
        </section> --}}
    </div>
</x-layouts.app>
