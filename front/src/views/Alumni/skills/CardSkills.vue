<template>
  <section>
  <div class=" border-[2px] border-skyblue p-3 rounded" :class="role=='ero'?'w-full mt-[1.5rem]':'w-[22rem] mt-14'">
    <div class='flex justify-between'>
      <h1 class="font-bold text-lg">Skills</h1>
      <div v-if="role == 'alumni'" @click="closePopUp(true)" class="hover:cursor-pointer">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="currentColor"
          class="w-6 h-6 hover:cursor-pointer text-white shadow bg-skyblue rounded-full"
        >
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
        </svg>
      </div>
    </div>
    <div class="" :class="{'h-32 overflow-auto':role == 'admin'}">
      <div class="flex py-2 flex-wrap gap-2">
        <card-skill v-if="alumniSkills.length >0"
          v-for:="(alumniSkill, i) in alumniSkills"
          :id="alumniSkill.id"
          :index="i"
          :role="role"
          @remove="removeAlumniSkill"
          >{{ alumniSkill.name }}</card-skill>
        <p v-else class="text-gray-600">No Skills for now</p>
      </div>
    </div>
      <form-skill
        @closePopUp="closePopUp"
        v-if="isClickAddSkill"
        :alumni_id="alu_id"
        @add-skill="addAlumniSkill"
      ></form-skill>
  </div>
  </section>
</template>

<script>
import SkillCard from "./CardSkill.vue";
import FormAddSkill from "../FormInput/FormAddSkill.vue";
import axios from "../../../axios-http";
export default {
  props: {
    alu_id: Number,
    role: String,
  },
  components: {
    "card-skill": SkillCard,
    "form-skill": FormAddSkill,
  },
  data() {
    return {
      isClickAddSkill: false,
      alumniSkills: [],
    };
  },
  methods: {
    closePopUp(popUp) {
      this.isClickAddSkill = popUp;
    },

    addAlumniSkill(skill){
      axios.post("alumniSkill", skill).then((res)=>{
        this.getAlumniSkill();
      });
    },
    
    getAlumniSkill() {
      axios.get("alumniSkill/" + this.alu_id).then((res) => {
        this.alumniSkills = res.data;
      });
    },
   
    removeAlumniSkill(remove) {
      axios.delete("alumniSkill/" + remove.id)
      this.alumniSkills.splice(remove.index, 1);
    },
  },
  watch: {
    alu_id() {
      this.getAlumniSkill();
    }
  },
  created() {
    if(this.alu_id) {
      this.getAlumniSkill();
    }
  },
};
</script>

<style>
.card-skill {
  padding: 10px;
  border: 1px solid black;
  border: none;
  box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
  background: rgb(105, 205, 252);
}

.card-title {
  border: 1px solid black;
  border: none;
  border-radius: 20px;
  background: orange;
  margin: 2px;
  padding: 5px 5px;
}

.img {
  color: white;
}
</style>
