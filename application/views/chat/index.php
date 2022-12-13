<?php
$role_id = $this->session->userdata('role_id');
$email = $this->session->userdata('email');
?>
<div class="flex-1 px-6  p-2 sm:p-6 justify-between flex flex-col h-full mb-8 ">
  <div id="messages" class="flex flex-col space-y-4 p-3 overflow-y-auto scrollbar-thumb-blue scrollbar-thumb-rounded scrollbar-track-blue-lighter scrollbar-w-2 scrolling-touch">
    <?= form_error('message', '<small class="p-1 text-center bg-red-200 text-red-600">', '</small>') ?>
    <?php foreach ($chat as $c) : ?>
      <?php if ($c['author'] != $email) : ?>
        <div class="chat-message">
          <div class="flex items-end">
            <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 items-start">
              <i class="text-xs"><?= $c['author'] ?></i>
              <div>
                <span class="px-4 py-2 rounded-lg inline-block rounded-bl-none bg-gray-300 text-gray-600">
                  <?= $c['message'] ?>
                </span>
              </div>
            </div>
          </div>
        </div>
      <?php else : ?>
        <div class="chat-message">
          <div class="flex items-end justify-end">
            <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-1 items-end">
              <i class="text-xs"><?= $c['author'] ?></i>
              <div>
                <span class="px-4 py-2 rounded-lg inline-block rounded-br-none bg-blue-600 text-white ">
                  <?= $c['message'] ?>
                </span>
              </div>
            </div>
          </div>
        </div>
      <?php endif ?>
    <?php endforeach ?>
  </div>
  <?php if ($role_id == 2) : ?>
    <div class=" fixed lg:w-[74.5%] w-full bottom-0 pt-4 mb-2 sm:mb-0">
      <form action="<?= base_url('chat') ?>" method="post">
        <div class="relative flex">
          <input type="text" name="message" placeholder="Write your message!" class="w-full focus:outline-none focus:placeholder-gray-400 text-gray-600 placeholder-gray-600 pl-4 bg-gray-200 rounded-md py-3">
          <div class="absolute right-0 items-center inset-y-0  sm:flex">
            <button type="submit" class="inline-flex items-center justify-center rounded-r-lg px-4 lg:mr-0 mr-5 py-3 transition duration-500 ease-in-out text-white bg-blue-500 hover:bg-blue-400 focus:outline-none">
              <span class="font-bold">Send</span>
            </button>
          </div>
        </div>
      </form>
    </div>
  <?php else : ?>
  <?php endif ?>
</div>