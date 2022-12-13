<div class="mt-[3.9rem] mb-44">
    <section class="shadow-xl ">
        <div class="container px-6 py-10 mx-auto">
            <h1 class="text-3xl font-semibold text-gray-800 capitalize lg:text-4xl "><?= $pid['title'] ?></h1>

            <div class="mt-8 lg:-mx-6 lg:flex lg:items-center">
                <img class="object-cover w-full lg:mx-6 lg:w-1/2 rounded-xl h-72 lg:h-96" src="<?= base_url('assets/img/posts/') . $pid['photo'] ?>" alt="">

                <div class="mt-6 lg:w-1/2 lg:mt-0 lg:mx-6 ">
                    <p class="text-sm text-blue-500 uppercase">
                        <?php if ($pid['id_category'] == 1) : ?>
                            Cook
                        <?php else : ?>
                            Drink
                        <?php endif ?>
                    </p>
                    <p class="mt-3 text-sm text-gray-500 0 md:text-sm whitespace-pre-line">
                        <?= $pid['description'] ?>
                    </p>


                    <div class="flex items-center mt-6">


                        <p class="text-sm text-gray-500 dark:text-gray-400"><?= $pid['author'] ?></p>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>