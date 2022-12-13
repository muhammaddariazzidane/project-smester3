<div class="flex flex-wrap gap-3 mt-28 pb-32  lg:px-6">
  <!-- card -->

  <?php foreach ($posts as $p) : ?>


    <div class="overflow-hidden shadow-xl mb-2 transition duration-500 ease-in-out transform hover:-translate-y-5 hover:shadow-2xl rounded-lg h-90 w-64 md:w-72 cursor-pointer m-auto">
      <a href="#" class="w-full block h-full">
        <img alt="blog photo" src="<?= base_url('assets/img/posts/') . $p['photo'] ?>" class="max-h-40 w-full object-cover" />
        <div class="bg-white w-full p-4">
          <p class="text-indigo-500 text-2xl font-medium">
            <?= $p['title'] ?>
          </p>

          <p class="text-gray-600 font-light text-md">
            <?= substr($p['description'], 0, 80) ?>...
            <a class="inline-flex text-xs italic hover:text-indigo-700 transistion-all duration-300 text-indigo-500" href="<?= base_url('home/detailpost/') ?><?= $p['id'] ?> ">Read More</a>
          </p>
          <div class="flex flex-wrap justify-starts items-center py-3 border-b-2 text-xs text-white font-medium">
            <span class="px-2 py-1 rounded capitalize bg-indigo-500">
              #<?= $p['category'] ?>
            </span>

          </div>
          <div class="flex items-center mt-2">


            <div class="font-medium italic text-sm">
              <?= $p['author'] ?>
            </div>

          </div>
        </div>
      </a>
    </div>
  <?php endforeach ?>


</div>