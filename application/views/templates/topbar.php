<main class="ease-soft-in-out  xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
  <!-- Navbar -->
  <nav class="relative flex flex-wrap items-center justify-between py-2 transition-all shadow-md duration-250 ease-soft-in  lg:flex-nowrap lg:justify-start" navbar-main navbar-scroll="true">
    <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
      <nav>
        <!-- breadcrumb -->
        <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
          <li class="leading-normal text-sm">
            <a class="opacity-50 text-slate-700" href="#">Pages</a>
          </li>
        </ol>
        <h6 class="mb-0 font-bold capitalize"><?= $title ?></h6>
      </nav>

      <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
        <div class="flex items-center md:ml-auto md:pr-4">
        </div>
        <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
          <li class="flex items-center relative">
            <a onclick="cek()" href="#" class="block px-0 py-2 font-semibold transition-all ease-nav-brand text-sm text-slate-500">
              <span class="hidden sm:inline capitalize "><?= $user['username'] ?>
              </span>
              <img  src="<?= base_url('assets/img/profile/') . $user['image'] ?>" class="inline h-full max-w-full transition-all duration-200 ease-nav-brand max-h-8" alt="">
            </a>
            <div class="absolute w-full top-[2.5rem] right-40 z-[999] lg:right-40 menu hidden">
              <div class="shadow-xl bg-white w-52 rounded-xl">
                <ul class="flex flex-col pl-0 mb-0">
                  <?php
                  $role_id = $this->session->userData('role_id');
                  $queryMenu = "SELECT `user_menu`.`id`,`menu` FROM `user_menu` JOIN `user_access_menu` ON `user_menu`.`id` = `user_access_menu`.`menu_id` WHERE `user_access_menu`.`role_id` = $role_id
                                ORDER BY `user_access_menu`.`menu_id` ASC ";
                  $menu = $this->db->query($queryMenu)->result_array();
                  ?>
                  <?php foreach ($menu as $m) : ?>
                    <!-- <div class="mb-2"></div> -->
                    <li class="w-full mt-4">
                      <h6 class="pl-6 ml-2 font-bold leading-tight uppercase text-xs opacity-60"><?= $m['menu'] ?></h6>
                    </li>
                    <?php
                    $menuId = $m['id'];
                    $querySubmenu = "SELECT * FROM `user_sub_menu` JOIN `user_menu` ON  `user_sub_menu`.`menu_id` = `user_menu`.`id` WHERE `user_sub_menu`.`menu_id` = $menuId AND `user_sub_menu`.`is_active` = 1  ORDER BY `user_sub_menu`.`url` DESC";
                    $subMenu = $this->db->query($querySubmenu)->result_array();
                    ?>
                    <?php foreach ($subMenu as $sm) : ?>
                      <?php if ($title == $sm['title']) : ?>
                        <li class="mt-0.5 w-full -translate-x-2 transition-all duration-300">
                          <a class="py-2.7 shadow-soft-xl text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg  px-4 text-slate-700 transition-colors" href="<?= base_url($sm['url']) ?>">
                            <div class="bg-gradient-to-tl from-purple-700 via-indigo-300 to-pink-200 shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                              <i class="<?= $sm['icon'] ?> text-white"></i>                             
                            </div>
                            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft"><?= $sm['title'] ?></span>
                          </a>
                        </li>
                      <?php else : ?>
                        <li class="mt-0.5 w-full hover:-translate-x-2  transition-all duration-300">
                          <a class="py-2.7 shadow-soft-xl text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg px-4  text-slate-700 transition-colors" href="<?= base_url($sm['url']) ?>">
                            <div class="bg-white shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                              <i class="<?= $sm['icon'] ?> "></i>
                            </div>
                            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft"><?= $sm['title'] ?></span>
                          </a>
                        </li>
                      <?php endif ?>
                    <?php endforeach ?>
                  <?php endforeach ?>
                </ul>
              </div>
            </div>
          </li>
          <li class="flex items-center pl-4 xl:hidden ">
            <a href="javascript:;" class="block p-0 transition-all ease-nav-brand text-sm text-red-500" sidenav-trigger>
              <div class="w-4.5 overflow-hidden">
                <i class="ease-soft mb-0.75 relative block h-0.5 rounded-sm bg-slate-500 transition-all"></i>
                <i class="ease-soft mb-0.75 relative block h-0.5 rounded-sm bg-slate-500 transition-all"></i>
                <i class="ease-soft relative block h-0.5 rounded-sm bg-slate-500 transition-all"></i>
              </div>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- end Navbar -->