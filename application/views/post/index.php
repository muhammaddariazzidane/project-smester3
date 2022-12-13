<?php

$role_id = $this->session->userdata('role_id');
$email = $this->session->userdata('email');

?>
<!-- cek login apakah admin atau user -->
<?php if ($role_id == 2) : ?>
  <!-- jika yang login user -->
  <div class="lg:w-1/2 w-full mx-auto">
    <?= $this->session->flashdata('message') ?>
  </div>
  <div class="w-full px-6 py-2">
    <button onclick="document.getElementById('myModal').showModal()" id="btn" class="py-2 mb-2 mt-3 px-10 bg-gray-800 text-white rounded text shadow-xl">Add Post</button>
    <dialog id="myModal" class="h-auto w-11/12 md:w-5/12 p-5 bg-gradient-to-bl from-indigo-50 to-red-100 rounded-xl shadow-xl ">
      <div class="flex flex-col w-full h-auto ">
        <!-- Header -->
        <div class="flex w-full h-auto justify-center items-center">
          <div class="flex w-10/12 h-auto py-3 justify-center items-center text-2xl font-bold">
            ADD NEW POST
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
        <div class="flex items-center justify-center ">
          <div class="mx-auto w-full max-w-[550px] ">
            <?= form_open_multipart('post/addpost') ?>
            <div class="sm:rounded-md sm:overflow-hidden">
              <div class="px-4 py-5 bg-transparent space-y-6 sm:p-6">
                <div>
                  <label for="title" class="block text-sm font-medium text-gray-700">
                    Title
                  </label>
                  <div class="mt-1">
                    <input type="text" name="title" id="title" class="selection:bg-lime-300 rounded-xl border border-indigo-300 p-2 w-full">
                    <?= form_error('title', '<small class="p-1 text-red-600">', '</small>') ?>
                  </div>
                </div>
                <div>
                  <label for="description" class="block text-sm font-medium text-gray-700">
                    description
                  </label>
                  <div class="mt-1">
                    <textarea name="description" id="description" class="selection:bg-lime-300 rounded-xl border border-indigo-300 p-2 w-full">
                        </textarea>
                    <?= form_error('description', '<small class="p-1 text-red-600">', '</small>') ?>
                  </div>
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700">
                    Photo
                  </label>
                  <div class="mt-2 flex items-center">
                    <input type="file" name="photo" id="photo">

                  </div>
                </div>
                <div>
                  <label for="id_category" class="block mb-1 text-sm font-medium text-gray-700">
                    Category
                  </label>
                  <select name="id_category" id="id_category" class="rounded-xl border border-indigo-300 p-2 w-full">
                    <option value="">Select Category</option>
                    <?php foreach ($categ as $c) : ?>
                      <option value="<?= $c['id'] ?>"><?= $c['category'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>
              <div class="px-4 pb-3 text-right sm:px-6">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  Create
                </button>
              </div>
            </div>
            </form>
          </div>
        </div>
        <!-- End of Modal Content-->
      </div>
    </dialog>
  </div>
  <div class="w-full flex flex-wrap gap-4 justify-center mx-auto px-6 py-6">
    <?php foreach ($posts as $p) : ?>
      <!-- menampilkan postingan berdasarkan yang membuat postingan  -->
      <!-- jika tidak sama -->
      <?php if ($p['author'] != $email) : ?>
        <!-- hasil jika tidak sama -->
      <?php else : ?>
        <div class="overflow-hidden shadow-xl mb-2 transition duration-500 ease-in-out transform hover:-translate-y-5 hover:shadow-2xl rounded-lg h-90 w-64 md:w-72 cursor-pointer m-auto">
          <a href="#" class="w-full block h-full">
            <img alt="blog photo" src="<?= base_url('assets/img/posts/') . $p['photo'] ?>" class="max-h-40 w-full object-cover" />
            <div class="bg-white w-full p-4">
              <p class="text-indigo-500 text-2xl font-medium">
                <?= $p['title'] ?>
              </p>

              <p class="text-gray-600 font-light text-md">
                <?= substr($p['description'], 0, 80) ?>...
                <a class="inline-flex text-xs italic hover:text-indigo-700 transistion-all duration-300 text-indigo-500" href="<?= base_url('home/detailpost/') ?><?= $p['id'] ?>">Read More</a>
              </p>
              <div class="flex flex-wrap justify-starts items-center py-3 border-b-2 text-xs text-white font-medium">
                <span class="py-1 rounded flex">
                  <a href="<?= base_url('post/editpost/') ?><?= $p['id'] ?>" class="font-medium  text-blue-600 ">
                    <i class="fas fa-fw fa-edit scale-125 hover:rotate-2  transition-all duration-300"></i>
                  </a>
                  <a onclick="return confirm('Are you sure to delete post?')" href="<?= base_url('post/deletepost/') ?><?= $p['id'] ?>" class="font-medium text-red-600 ">
                    <i class="fas fa-fw fa-trash scale-125 mx-2 hover:rotate-2  transition-all duration-300"></i>
                  </a>
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
        <!-- hasil jika sama & tampilan untuk user -->
      <?php endif ?>
    <?php endforeach ?>
  </div>
<?php else : ?>
  <!-- jika yang login admin -->
  <div class="lg:w-1/2 w-full mx-auto">
    <?= $this->session->flashdata('message') ?>
  </div>
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
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
            Description
          </th>
          <th scope="col" class="px-6 py-3">
            Category
          </th>
          <th scope="col" class="px-6 py-3">
            author
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
        <?php foreach ($posts as $p) : ?>
          <tr class="bg-white border-b  hover:bg-gray-50 ">
            <th scope="col" class="px-6 py-3">
              <?= $i ?>
            </th>
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
              <?= $p['title'] ?>
            </th>
            <th scope="row" class="px-6 py-4 font-medium text-gray-900  ">
              <?= $p['description'] ?>
            </th>
            <th scope="row" class="px-6 py-4 font-medium capitalize text-gray-900  ">
              <?= $p['category'] ?>
            </th>
            <th scope="row" class="px-6 py-4 font-medium italic lowercase text-gray-900  whitespace-nowrap">
              <?= $p['author'] ?>
            </th>
            <td class="px-6 py-4 ">
              <a href="<?= base_url('post/editpost/') ?><?= $p['id'] ?>" class="font-medium text-blue-600 dark:text-blue-500">
                <i class="fas fa-fw fa-edit hover:rotate-2 hover:scale-110 transition-all duration-300"></i>
              </a>
              <a onclick="return confirm('are you sure to delete?')" href="<?= base_url('post/deletepost/') ?><?= $p['id'] ?> " class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                <i class="fas fa-fw fa-trash ml-2 text-red-600  hover:scale-110 transition-all duration-300"></i></a>
            </td>
          </tr>
          <?php $i++ ?>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>

<?php endif ?>