<template lang="">
  <Head>
    <Title>Profile | Psyche Assist</Title>
  </Head>

  <div class="bg-[#e4e4e4] h-auto w-full absolute top-0">

    <Navbar />

    <div class="relative lg:px-20 px-5 mb-20 text-white tracking-wide">
      <div class="justify-between flex mb-3">
        <p class="text-[#445277] text-xl font-bold">Guest Profile</p>
          <button @click="confirmLogout"
            class="border px-3 py-2 bg-[#ff7765] hover:opacity-70 rounded-lg flex" id="logout">Log
            out
          </button>
        </div>
      <div class="h-auto w-full bg-[#808dad] rounded-md p-5">
        <div class="grid grid-cols-2 gap-5">
          <section class="p-10 h-auto w-full border rounded-lg">
            <img class="w-auto h-32" src="/assets/img/guest/user.png" alt="user-img">
          </section>
          <div class="">
            <section class="p-10 h-auto border rounded-md">
              <p>Result:</p>
            </section>
            <section class="p-10 h-auto border rounded-md mt-5">
              <p></p>
            </section>
          </div>
        </div>
      </div>
    </div>

    <Footer />

  </div>

</template>

<script>
import Navbar from '~/layouts/navbar.vue';
import Footer from '~/layouts/footer.vue';

export default {
  components: {
    Navbar,
    Footer
  },
  methods: {
    confirmLogout() {
      const result = window.confirm('Are you sure you want to log out?');

      if (result) {
        alert('Logging out...');

        this.$router.push('/');
      }
    },
  },
}
</script>