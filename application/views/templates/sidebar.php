<!-- sidenav  -->
<aside class="max-w-[16.5rem] ease-nav-brand z-990 fixed inset-y-0 my-4 ml-4 block w-full -translate-x-full flex-wrap items-center justify-between overflow-y-auto rounded-2xl bg-white p-0 antialiased shadow-lg transition-transform duration-200 xl:left-0 xl:translate-x-0 xl:bg-transparent">
  <div class="h-auto">
    <i class="absolute top-0 right-0 hidden p-4 opacity-50 cursor-pointer fas fa-times text-slate-400 xl:hidden" sidenav-close></i>
    <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap text-slate-700" href="javascript:;" target="_blank">
      <img src="<?= base_url('assets/img/profile/') . $user['image'] ?>" class="inline h-full max-w-full transition-all duration-200 ease-nav-brand max-h-8" alt="/" />
      <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand capitalize"><?= $user['username'] ?></span>
    </a>
  </div>
  <hr class="h-px mt-0 bg-gradient-to-r from-red-600 via-black/40 to-lime-400" />
  <div class="items-center block w-auto h-screen overflow-y-auto overflow-x-hidden ">
    <ul class="flex flex-col pl-0 mb-0">
      <!-- query -->
      <?php
      $role_id = $this->session->userdata('role_id');
      $queryMenu = "SELECT `user_menu`.`id`,`menu` FROM `user_menu` JOIN `user_access_menu` ON `user_menu`.`id` = `user_access_menu`.`menu_id` WHERE `user_access_menu`.`role_id` = $role_id
        ORDER BY `user_access_menu`.`menu_id` ASC
        ";
      $menu = $this->db->query($queryMenu)->result_array();
      ?>
      <?php foreach ($menu as $m) : ?>
        <li class="w-full mt-4">
          <h6 class="pl-6 ml-2 font-bold leading-tight uppercase text-xs opacity-60"><?= $m['menu'] ?></h6>
        </li>
        <?php
        $menuId = $m['id'];
        $querySubmenu = "SELECT * FROM `user_sub_menu` JOIN `user_menu` ON  `user_sub_menu`.`menu_id` = `user_menu`.`id` WHERE `user_sub_menu`.`menu_id` = $menuId AND `user_sub_menu`.`is_active` = 1
         ORDER BY `user_sub_menu`.`url` DESC 
       ";
        $subMenu = $this->db->query($querySubmenu)->result_array();
        ?>
        <?php foreach ($subMenu as $sm) : ?>
          <?php if ($title == $sm['title']) : ?>
            <li class="mt-0.5 w-full translate-x-2 transition-all duration-300">
              <a class="py-2.7 shadow-soft-xl text-sm ease-nav-brand mb-1 mx-4 shadow-md flex items-center whitespace-nowrap rounded-lg  px-4 font-semibold text-slate-700 transition-colors" href="<?= base_url($sm['url']) ?>">
                <div class="bg-gradient-to-tl from-purple-700 via-indigo-300 to-pink-200 shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                  <i class="<?= $sm['icon'] ?> text-white"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft"><?= $sm['title'] ?></span>
              </a>
            </li>
          <?php else : ?>
            <li class="mt-0.5 w-full hover:translate-x-2 transition-all duration-300">
              <a class="py-2.7 shadow-soft-xl text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg px-4  text-slate-700 transition-colors" href="<?= base_url($sm['url']) ?>">
                <div class="bg-white shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                  <i class="<?= $sm['icon'] ?>"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft"><?= $sm['title'] ?></span>
              </a>
            </li>
          <?php endif ?>
        <?php endforeach ?>
      <?php endforeach ?>
    </ul>
  </div>
</aside>