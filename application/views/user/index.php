<!-- cards -->
<div class="lg:w-1/2 w-full mx-auto">
    <?= $this->session->flashdata('message') ?>
</div>
<div class="w-full lg:w-1/2 py-28 px-6 mx-auto">
    <div class="w-full lg:w-6/12 mx-auto rounded-xl bg-gradient-to-br from-indigo-300 via-purple-100 to-slate-200 pt-8 shadow-2xl">
        <div class="flex justify-center pb-10">
            <img src="<?= base_url('assets/img/profile/') . $user['image'] ?>" class="h-40 w-40 rounded-full object-cover" alt="username" />
            <div class="ml-10">
                <div class="flex items-center">
                    <h2 class="block leading-relaxed font-light text-gray-700 text-3xl"><?= $user['username'] ?></h2>
                    <a href="<?= base_url('user/edit') ?>" class="cursor-pointer ml-2 p-1 border-transparent text-gray-700 rounded-full hover:text-blue-600 focus:outline-none focus:text-gray-600" aria-label="Notifications">
                        <i class="fas fw fa-user-edit scale-125 hover:rotate-6 transition-all duration-300"></i>
                    </a>
                </div>
                <br>
                <div class="">
                    <span class="text-base"><?= date('d F Y', $user['date_created']) ?></span>
                    <a class="block text-base lowercase text-blue-500 mt-2"><?= $user['email'] ?></a>
                </div>
            </div>
        </div>
    </div>
</div>