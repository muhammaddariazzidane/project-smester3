<main class="mt-10 transition-all duration-200 ease-soft-in-out">
  <section>
    <div class="relative flex items-center p-0 overflow-hidden bg-center bg-cover min-h-75-screen">
      <div class="container z-10">
        <div class="flex flex-wrap mt-0 -mx-3 ">
          <div class="flex flex-col w-full max-w-full px-3 mx-auto md:flex-0 shrink-0 md:w-6/12 lg:w-5/12 xl:w-4/12 shadow-xl bg-gradient-to-tl from-red-400 text-white to-indigo-300 rounded-3xl">
            <div class="relative flex flex-col min-w-0 py-12 break-words bg-transparent border-0 shadow-none rounded-2xl bg-clip-border">
              <div class="p-6 pb-0 mb-0 bg-transparent border-b-0 rounded-t-2xl">
                <?= $this->session->flashdata('message') ?>
                <!-- <div class="text-center w-[340px] mb-2 rounded-md mx-auto bg-green-400 text-black p-3">woiwiie</div> -->
                <h3 class="relative z-10 font-bold  text-white"><?= $title ?></h3>
                <p class="mb-0 text-slate-200">Enter your email and password to <?= $title ?></p>
              </div>
              <div class="flex-auto p-6">
                <form role="form" method="post" action="<?= base_url('auth') ?>">
                  <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Email</label>
                  <div class="mb-4">
                    <input type="text" value="<?= set_value("email") ?>" id="email" name="email" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="Email" aria-label="Email" aria-describedby="email-addon" />
                    <?= form_error('email', '<small class="p-1 text-red-600">', '</small>') ?>
                  </div>
                  <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Password</label>
                  <div class="mb-4">
                    <input type="password" id="password" name="password" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="Password" aria-label="Password" aria-describedby="password-addon" />
                    <?= form_error('password', '<small class="p-1 text-red-600">', '</small>') ?>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="inline-block w-full px-6 py-3 mt-6 mb-0 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-x-25 bg-150 leading-pro text-xs ease-soft-in tracking-tight-soft bg-gradient-to-tl from-blue-600 to-cyan-400 hover:scale-102 hover:shadow-soft-xs active:opacity-85"><?= $title ?></button>
                  </div>
                </form>
              </div>
              <div class="p-6 px-1 pt-0 text-center bg-transparent border-t-0 border-t-solid rounded-b-2xl lg:px-2">
                <p class="mx-auto mb-6 leading-normal text-sm text-slate-200">
                  Don't have an account?
                  <a href="<?= base_url('auth/register') ?>" class="relative z-10 font-semibold text-white underline">Register</a>
                </p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
</main>