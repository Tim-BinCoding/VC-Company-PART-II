<template>
  <div class="border-[2px] border-skyblue p-3 rounded">
    <div class="flex justify-between">
      <h1 class="font-bold text-lg">General Information</h1>
      <div v-if="role!='admin' && role!='ero'" @click="isEditInfo" class="hover:cursor-pointer " >
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-white p-1 bg-skyblue rounded-full">
          <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
        </svg>
      </div>
    </div>
    <div class="p-2">
      <div class="flex">
        <div class="w-[50%] flex">
          <div class="w-[36%]">
            <p class="p-1 mb-2">First Name:</p>
            <p class="p-1 mb-2">Gender:</p>
            <p class="p-1 mb-2">Major:</p>
          </div>
          <div class="w-[54%]">
            <p class="w-full px-2 py-1 mb-2 font-semibold">{{user.first_name}}</p>
            <p class="w-full px-2 py-1 mb-2 font-semibold">{{gender}}</p>
            <p class="w-full px-2 py-1 mb-2 font-semibold">{{user.major}}</p>
          </div>
        </div>
        <div class="w-[50%] flex">
          <div class="w-[36%]">
            <p class="p-1 mb-2">Last Name:</p>
            <p class="p-1 mb-2">Batch:</p>
            <p class="p-1 mb-2">Tel:</p>
          </div>
          <div class="w-[54%]">
            <p class="w-full px-2 py-1 mb-2 font-semibold">{{user.last_name}}</p>
            <p class="w-full px-2 py-1 mb-2 font-semibold">{{user.batch}}</p>
            <p class="w-full px-2 py-1 mb-2 font-semibold">{{user.phone}}</p>
          </div>
        </div>
      </div>
      <div class="flex">
        <div class="w-[18%]">
          <p class="p-1">Email:</p>
        </div>
        <div class="w-[77%]">
          <p class="w-full px-2 py-1 font-semibold">{{user.email}}</p>
        </div>
      </div>
    </div>
    <edit-info v-if="isEdit" @closePopup="isEdit = false" @alumniInfo="updateInfo" :user="user" />
  </div>
</template>>
  
<script>
  import axios from '../../../axios-http'
  import FormEdit from '../FormInput/UpdateAlumniInfo.vue'
  export default {
    emits: ['getData','update-nav'],
    props: ['user','role',],
    components:{
      'edit-info': FormEdit,
    },
    computed: {
      gender() {
        if(this.user.gender == 'F') {
          return 'Female';
        }else if (this.user.gender == "M"){
          return 'Male';
        }else {
          return "Others";
        }
      }
    },
    data() {
      return {
        isEdit: false,
      }
    },
    methods: {
      isEditInfo() {
        this.isEdit = true;
      },
      updateInfo(alumni) {
        axios.put('/alumni/' + this.$store.state.userId, alumni).then(res => {
            this.$emit('getData');
            this.$emit('update-nav');
            this.isEdit = false;
        })
      }

    }
  };
</script>

  
  <style>
  
  </style>
  