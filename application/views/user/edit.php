<div class="w-full px-6 h-screen py-6 mx-auto">
  <div class="md:grid md:grid-cols-1 md:gap-6 lg:w-6/12 w-full mx-auto">
    <div class="mt-5 md:mt-0 md:col-span-2">
      <?= form_open_multipart('user/edit')  ?>
      <div class="shadow-xl sm:rounded-md sm:overflow-hidden">
        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

          <div>
            <label for="about" class="block text-sm font-medium text-gray-700">
              Email
            </label>
            <div class="mt-1">
              <input type="text" name="email" id="email" value="<?= $user['email'] ?>" class="rounded-xl border border-indigo-300 p-2 w-full" readonly>
              <?= form_error('email', '<small class="p-1 text-red-600">', '</small>') ?>
            </div>

          </div>
          <div>
            <label for="about" class="block text-sm font-medium text-gray-700">
              Username
            </label>
            <div class="mt-1">
              <input type="text" name="username" id="username" value="<?= $user['username'] ?>" class="rounded-xl border border-indigo-300 p-2 w-full">
              <?= form_error('username', '<small class="p-1 text-red-600">', '</small>') ?>
            </div>
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">
              Photo
            </label>
            <div class="mt-2 flex items-center">
              <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                <img src="<?= base_url('assets/img/profile/') . $user['image'] ?>" alt="" class="w-32 rounded-md">
              </span>
              <button type="button" class="ml-5 bg-white py-2 px-3 mb-2 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <input type="file" name="image" id="image" class="">
              </button>
            </div>
          </div>
        </div>
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
          <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Edit Profile
          </button>
        </div>
      </div>
      </form>
    </div>
  </div>

</div>