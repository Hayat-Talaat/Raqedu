<template>
	 <el-rate v-model="value1" :disabled = "readonly"></el-rate>
</template>

<script>
export default {

  name: 'rate',
  props : {
  	val : {
  		type : Number , 
  		required : true
  	},
    readonly : {
      type : Boolean , 
      default : false
    }
  },
  data () {
    return {
    	value1 : 0
    }
  },
  mounted(){
  	this.value1 = this.val
  }
}
</script>

<style lang="css" scoped>
</style>