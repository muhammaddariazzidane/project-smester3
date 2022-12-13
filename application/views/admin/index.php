<div class="lg:w-1/2 w-full mx-auto">
  <?= $this->session->flashdata('message') ?>
</div>
<div class="w-full px-6 pt-6 mx-auto">
  <!-- row 1 -->
  <div class="flex flex-wrap -mx-3">
    <div class="w-full px-3 mb-3 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
      <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="flex-auto p-4">
          <div class="flex flex-row -mx-3">
            <div class="flex-none w-2/3 max-w-full px-3">
              <div>
                <p class="mb-0 font-sans font-semibold leading-normal text-sm">Admin</p>
                <h5 class="mb-0 text-lime-500 font-bold">
                  <?= $admin ?>
                </h5>
              </div>
            </div>
            <div class="px-3 text-right basis-1/3">
              <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-300 to-slate-300">
                <i class="fas fa-user relative top-2.5 hover:scale-125 transition-all duration-300 text-black"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="w-full px-3 mb-3 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
      <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="flex-auto p-4">
          <div class="flex flex-row -mx-3">
            <div class="flex-none w-2/3 max-w-full px-3">
              <div>
                <p class="mb-0 font-sans font-semibold leading-normal text-sm">Users</p>
                <h5 class="mb-0 text-lime-500 font-bold">
                  <?= $users ?>
                </h5>
              </div>
            </div>
            <div class="px-3 text-right basis-1/3">
              <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-300 to-slate-300">
                <i class="fas fa-users relative top-2.5 hover:scale-125 transition-all duration-300 text-black"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="w-full px-3 mb-3 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
      <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="flex-auto p-4">
          <div class="flex flex-row -mx-3">
            <div class="flex-none w-2/3 max-w-full px-3">
              <div>
                <p class="mb-0 font-sans font-semibold leading-normal text-sm">Menu</p>
                <h5 class="mb-0 text-lime-500 font-bold">
                  <?= $sb ?>
                </h5>
              </div>
            </div>
            <div class="px-3 text-right basis-1/3">
              <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-300 to-slate-300">
                <i class="fas fa-anchor relative top-2.5 hover:scale-125 transition-all duration-300 text-black"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="w-full px-6 min-h-screen py-6 mx-auto">
  <button onclick="document.getElementById('myModal').showModal()" id="btn" class="py-2 mb-8 mt-3 px-10 bg-gray-800 text-white rounded text shadow-xl">Add Menu</button>
  <dialog id="myModal" class="h-auto w-11/12 md:w-1/2 p-5  bg-gradient-to-bl from-indigo-50 to-sky-100 rounded-md ">
    <div class="flex flex-col w-full h-auto ">
      <!-- Header -->
      <div class="flex w-full h-auto justify-center items-center">
        <div class="flex w-10/12 h-auto py-3 justify-center items-center text-2xl font-bold">
          ADD NEW MENU
        </div>
        <div onclick="document.getElementById('myModal').close();" class="flex w-1/12 h-auto justify-center cursor-pointer">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
          </svg>
        </div>
        <!--Header End-->
      </div>
      <!-- Modal Content-->
      <div class="flex items-center justify-center p-12">
        <div class="mx-auto w-full max-w-[550px] ">
          <form action="<?= base_url('admin/addsubmenu') ?>" method="post">
            <div class="-mx-3 flex flex-wrap">
              <div class="w-full px-3 sm:w-1/2">
                <div class="mb-5">
                  <label for="title" class="mb-3 block text-base font-medium text-[#07074D]">
                    Title
                  </label>
                  <input type="text" name="title" id="title" placeholder="Title" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
              </div>
              <div class="w-full px-3 sm:w-1/2">
                <div class="mb-5">
                  <label for="menu_id" class="mb-3 block text-base font-medium text-[#07074D]">
                    Menu
                  </label>
                  <select name="menu_id" id="menu_id" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                    <option value="">Select Menu</option>
                    <?php foreach ($menu as $m) : ?>
                      <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                    <?php endforeach ?>
                  </select>

                </div>
              </div>
              <div class="w-full px-3 sm:w-1/2">
                <div class="mb-5">
                  <label for="url" class="mb-3 block text-base font-medium text-[#07074D]">
                    Url
                  </label>
                  <input type="text" name="url" id="url" placeholder="Url" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
              </div>
              <div class="w-full px-3 sm:w-1/2">
                <div class="mb-5">
                  <label for="icon" class="mb-3 block text-base font-medium text-[#07074D]">
                    Icon
                  </label>
                  <input type="text" name="icon" id="icon" placeholder="Icon" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
              </div>
            </div>
            <div class="mb-5">
              <label class="mb-3 block text-base font-medium text-[#07074D]">
                Active?
              </label>
              <div class="flex items-center space-x-6">
                <div class="flex items-center">
                  <input value="1" type="radio" name="is_active" id="is_active" class="h-5 w-5" checked />
                  <label for="is_active" class="pl-3 text-base font-medium text-[#07074D]">
                    Yes
                  </label>
                </div>
                <div class="flex items-center">
                  <input value="0" type="radio" name="is_active" id="is_active" class="h-5 w-5" />
                  <label for="is_active" class="pl-3 text-base font-medium text-[#07074D]">
                    No
                  </label>
                </div>
              </div>
            </div>
            <div>
              <button type="submit" class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none">
                Add Menu
              </button>
            </div>
          </form>
        </div>
      </div>
      <!-- End of Modal Content-->
    </div>
  </dialog>
  <div class="relative  overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead class="text-xs  text-gray-700 uppercase bg-gray-50  dark:text-gray-400">
        <tr>
          <th scope="col" class="px-6 py-3">
            #
          </th>
          <th scope="col" class="px-6 py-3">
            Title
          </th>
          <th scope="col" class="px-6 py-3">
            Menu
          </th>
          <th scope="col" class="px-6 py-3">
            Url
          </th>
          <th scope="col" class="px-6 py-3">
            Icon
          </th>
          <th scope="col" class="px-6 py-3">
            Active
          </th>
          <th scope="col" class="px-6 py-3">
            Action
          </th>
          <th scope="col" class="px-6 py-3">
            <span class="sr-only">Edit</span>
          </th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1 ?>
        <?php foreach ($submenu as $sm) : ?>
          <tr class="bg-white border-b  hover:bg-gray-50 ">
            <th scope="col" class="px-6 py-3">
              <?= $i ?>
            </th>
            <th scope="row" class="px-6 py-4 font-medium text-gray-900  whitespace-nowrap">
              <?= $sm['title'] ?>
            </th>
            <td class="px-6 py-4">
              <?= $sm['menu'] ?>
            </td>
            <td class="px-6 py-4">
              <?= $sm['url'] ?>
            </td>
            <td class="px-6 py-4">
              <?= $sm['icon'] ?>
            </td>
            <td class="px-6 py-4">
              <?php if ($sm['is_active'] == 1) : ?>
                <p class="text-green-600 text-center">Yes</p>
              <?php else : ?>
                <p class="text-red-600 text-center">
                  No
                </p>
              <?php endif ?>
            </td>
            <td class="px-6 py-4 ">
              <?php if ($sm['title'] != 'Dashboard') : ?>
                <a href="<?= base_url('admin/editsubmenu/') ?><?= $sm['id'] ?>" class="font-medium  text-blue-600 dark:text-blue-500">
                  <i class="fas fa-fw fa-edit hover:rotate-2 hover:scale-110 transition-all duration-300"></i>
                </a>
                <a onclick="return confirm('are you sure to delete?')" href="<?= base_url('admin/deletesubmenu/') ?><?= $sm['id'] ?> " class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                  <i class="fas fa-fw fa-trash ml-2 text-red-600  hover:scale-110 transition-all duration-300"></i></a>
              <?php else : ?>
              <?php endif ?>
            </td>
          </tr>
          <?php $i++ ?>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>