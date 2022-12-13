<div class="w-full px-6 min-h-screen  py-6 mx-auto">
  <div class="md:grid md:grid-cols-1 md:gap-6 lg:w-6/12 w-full mx-auto">
    <div class="mt-5 md:mt-0 md:col-span-2">
      <form action="" method="post">
        <input type="hidden" value="<?= $sm['id'] ?>" name="id" id="id">
        <div class="shadow-xl sm:rounded-md sm:overflow-hidden">
          <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
            <div>
              <label for="about" class="block text-sm font-medium text-gray-700">
                Title
              </label>
              <div class="mt-1">
                <input type="text" name="title" id="title" value="<?= $sm['title'] ?>" class="rounded-xl border border-indigo-300 p-2 w-full">
                <?= form_error('title', '<small class="p-1 text-red-600">', '</small>') ?>
              </div>
            </div>
            <div>
              <label for="menu_id" class="block text-sm font-medium text-gray-700">
                Menu
              </label>
              <select name="menu_id" id="menu_id" class="rounded-xl border border-indigo-300 p-2 w-full">
                <?php foreach ($menu as $m) : ?>
                  <?php if ($m['id'] == $sm['menu_id']) : ?>
                    <option value="<?= $m['id'] ?>" selected><?= $m['menu'] ?></option>
                  <?php else : ?>
                    <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                  <?php endif ?>
                <?php endforeach ?>
              </select>
            </div>
            <div>
              <label for="about" class="block text-sm font-medium text-gray-700">
                Url
              </label>
              <div class="mt-1">
                <input type="text" name="url" id="url" value="<?= $sm['url'] ?>" class="rounded-xl border border-indigo-300 p-2 w-full">
                <?= form_error('url', '<small class="p-1 text-red-600">', '</small>') ?>
              </div>
            </div>
            <div>
              <label for="about" class="block text-sm font-medium text-gray-700">
                Icon
              </label>
              <div class="mt-1">
                <input type="text" name="icon" id="icon" value="<?= $sm['icon'] ?>" class="rounded-xl border border-indigo-300 p-2 w-full">
                <?= form_error('icon', '<small class="p-1 text-red-600">', '</small>') ?>
              </div>
            </div>
            <div class="">
              <label class="mb-2 block text-base font-medium text-[#07074D]">
                Active?
              </label>
              <div class="flex items-center space-x-6">
                <?php if ($sm['title'] == 'Dashboard') : ?>
                  <div class="flex items-center">
                    <input value="1" type="radio" name="is_active" id="is_active" class="h-5 w-5" checked />
                    <label for="is_active" class="pl-3 text-base font-medium text-[#07074D]">
                      Yes
                    </label>
                  </div>
                <?php else : ?>
                  <?php if ($sm['is_active'] == 1) : ?>
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
                  <?php else : ?>
                    <div class="flex items-center">
                      <input value="1" type="radio" name="is_active" id="is_active" class="h-5 w-5" />
                      <label for="is_active" class="pl-3 text-base font-medium text-[#07074D]">
                        Yes
                      </label>
                    </div>
                    <div class="flex items-center">
                      <input value="0" type="radio" name="is_active" id="is_active" class="h-5 w-5" checked />
                      <label for="is_active" class="pl-3 text-base font-medium text-[#07074D]">
                        No
                      </label>
                    </div>
                  <?php endif ?>
                <?php endif ?>
              </div>
            </div>
          </div>
          <div class="px-4 pb-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              update
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>

</div>