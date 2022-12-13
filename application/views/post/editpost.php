<div class="lg:w-1/2 w-full mx-auto">
  <?= $this->session->flashdata('message') ?>
</div>
<div class="w-full lg:w-1/2 px-6 py-3 mx-auto">
  <form action="" method="post" enctype="multipart/form-data">
    <div class="shadow-xl sm:rounded-md sm:overflow-hidden">
      <input type="hidden" name="id" value="<?= $pid['id'] ?>">:
      <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
        <div>
          <label class="block text-sm font-medium text-gray-700">
            Title
          </label>
          <div class="mt-1">
            <input type="text" name="title" id="title" class="rounded-xl border border-indigo-300 p-2 w-full" value="<?= $pid['title'] ?>">
            <?= form_error('title', '<small class="p-1 text-red-600">', '</small>') ?>
          </div>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700">
            Description
          </label>
          <div class="mt-1">
            <input type="text" name="description" id="description" class="rounded-xl border border-indigo-300 p-2 w-full" value="<?= $pid['description'] ?>">
            <?= form_error('description', '<small class="p-1 text-red-600">', '</small>') ?>
          </div>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700">
            Author
          </label>
          <div class="mt-1">
            <input type="text" name="author" id="author" class="rounded-xl border border-indigo-300 p-2 w-full" value="<?= $pid['author'] ?>" readonly>
            <?= form_error('author', '<small class="p-1 text-red-600">', '</small>') ?>
          </div>
        </div>
        <div>
          <label for="id_category" class="block mb-1 text-sm font-medium text-gray-700">
            Category
          </label>
          <select name="id_category" id="id_category" class="rounded-xl border border-indigo-300 p-2 w-full">

            <!--  -->
            <?php foreach ($cate as $c) : ?>
              <?php if ($c['id'] == $pid['id_category']) : ?>
                <option value="<?= $c['id'] ?>" selected><?= $c['category'] ?></option>
              <?php else : ?>
                <option value="<?= $c['id'] ?>"><?= $c['category'] ?></option>
              <?php endif ?>
            <?php endforeach ?>
          </select>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700">
            Photo
          </label>
          <div class="mt-2 flex items-center">
            <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
              <img src="<?= base_url('assets/img/posts/') . $pid['photo'] ?>" alt="" class="w-32 rounded-md">
            </span>
            <input type="file" name="photo" id="photo" class="ml-2 p-2">
          </div>
        </div>
      </div>
      <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          Edit post
        </button>
      </div>
    </div>
  </form>
</div>