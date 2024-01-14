<template lang="">
  <Head>
    <Title>Home | Psyche Assist</Title>
  </Head>
  
  <div class="bg-[#e4e4e4] h-auto w-full absolute top-0 text-[#4f608a]">

    <Navbar />

    <div class="relative lg:px-20 px-5 mb-20 tracking-wide">
      <section class="lg:flex block m-auto gap-5">
        <img class="w-auto h-96 m-auto" src="/assets/img/guest/art-dark.png" alt="art">
        <div class="m-auto">
          <h1 class="text-4xl text-start cursor-default font-black mb-5 text-[#445277]">STI 😎 With Healthy Lifestyle</h1>
          <p class="text-start mb-5">A healthy and meaningful life
            requires an
            emotional state
            of well-being. It
            includes the
            capacity to
            comprehend, control, and express emotions in a way that has a positive influence on your general quality of
            life. This manual will examine the numerous facets of emotional health and will arm you with knowledge,
            techniques, and tools to support and improve your emotional health.
          </p>
          <nuxt-link to="/guest/about">
            <button class="m-auto bg-[#FEBD5B] px-7 rounded-lg py-2 hover:bg-[#5c6f9f] shadow-lg font-semibold hover:text-white text-[#445277] tracking-wider transition duration-300 ease-in-out">Learn More</button>
          </nuxt-link>
        </div>
      </section>

      <section class="mt-20">
        <h1
          class="text-4xl font-extrabold cursor-default text-start text-[#445277]">
          Welcome to
          the "Exploring Emotional
          Well-Being"
        </h1>
        <p class="mt-3 text-start">We are excited to have you
          participate in this
          important study focused on
          understanding
          emotions and
          emotional
          well-being.
        </p>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-7 lg:gap-2 lg:grid-cols-4 mt-14">
          <a href="https://www.who.int/thailand/activities/creating-awareness-on-prevention-and-control-of-depression"
            target="_blank">
            <div class="relative overflow-hidden cursor-pointer group">
              <img src="/assets/img/guest/depression.jpg" alt="health" class="rounded-full object-cover h-72 w-72 mx-auto">
              <div
                class="absolute w-3/4 left-1/2 transform -translate-x-1/2 text-center bg-primary-color-dark bg-opacity-80 backdrop-filter backdrop-blur-lg border border-primary-color rounded-lg text-extra-light group-hover:-bottom-6 transition-all duration-300 ease-out text-white group-hover:-translate-y-[135px]">
                <p class="text-sm my-1">Raise Awareness</p>
                <p class="font-semibold text-base mb-2">Depression</p>
              </div>
            </div>
          </a>

          <a href="https://www.cdc.gov/ncbddd/adhd/features/adhd-awareness.html" target="_blank">
            <div class="relative overflow-hidden cursor-pointer group">
              <img src="/assets/img/guest/adhd.jpg" alt="health" class="rounded-full object-cover h-72 w-72 mx-auto">
              <div
                class="absolute w-3/4 left-1/2 transform -translate-x-1/2 text-center bg-primary-color-dark bg-opacity-80 backdrop-filter backdrop-blur-lg border border-primary-color rounded-lg text-extra-light group-hover:-bottom-6 transition-all duration-300 ease-out text-white group-hover:-translate-y-[135px]">
                <p class="text-sm my-1">Raise Awareness</p>
                <p class="font-semibold text-base mb-2">ADHD</p>
              </div>
            </div>
          </a>

          <a href="https://my.clevelandclinic.org/health/diseases/9536-anxiety-disorders" target="_blank">
            <div class="relative overflow-hidden cursor-pointer group">
              <img src="/assets/img/guest/anxiety.jpg" alt="health" class="rounded-full object-cover h-72 w-72 mx-auto">
              <div
                class="absolute w-3/4 left-1/2 transform -translate-x-1/2 text-center bg-primary-color-dark bg-opacity-80 backdrop-filter backdrop-blur-lg border border-primary-color rounded-lg text-extra-light group-hover:-bottom-6 transition-all duration-300 ease-out text-white group-hover:-translate-y-[135px]">
                <p class="text-sm my-1">Raise Awareness</p>
                <p class="font-semibold text-base mb-2">Anxiety</p>
              </div>
            </div>
          </a>

          <a href="https://meridianpsychiatricpartners.com/the-importance-of-raising-awareness-about-bipolar-disorder/"
            target="_blank">
            <div class="relative overflow-hidden cursor-pointer group">
              <img src="/assets/img/guest/bipolar.jpg" alt="health" class="rounded-full object-cover h-72 w-72 mx-auto">
              <div
                class="absolute w-3/4 left-1/2 transform -translate-x-1/2 text-center bg-primary-color-dark bg-opacity-80 backdrop-filter backdrop-blur-lg border border-primary-color rounded-lg text-extra-light group-hover:-bottom-6 transition-all duration-300 ease-out text-white group-hover:-translate-y-[135px]">
                <p class="text-sm my-1">Raise Awareness</p>
                <p class="font-semibold text-base mb-2">Bipolar Disorder</p>
              </div>
            </div>
          </a>
        </div>
      </section>
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
}
</script>