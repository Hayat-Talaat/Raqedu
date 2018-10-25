<template>
	<div>
		<nav class = "red padding-3">
			<a class="white-text text-basic text-thin text-lg" href="/">Raqedu</a>
		</nav>
		<div class="container">
      <div>
        
      <div class="row padding-1">
        <div class="col s12" style = "margin-bottom: 3px !important">
          <el-input  
          v-model = "question" type = "textarea" placeholder = "Question.." />
        </div>
        <div class="col s12" style = "margin-bottom: 3px !important">
          <el-input clearable v-model = "answer"  placeholder = "Question.." >
            <el-button @click = "addAnswer" slot = "append" icon = "el-icon-plus" />
          </el-input>
        </div>
      </div>
      <ul>
        <li v-for = "ans in answers">{{ ans.answer }}</li>
      </ul>
      <div class="row">
        <div class="col s12">
          <el-button @click = "addQuestion" type = "primary" class = "full-width"> Add Question </el-button>
        </div>
      </div>
      <div class="row">
        <div v-for = "(q, i) in questions">
          <div class="row grey lighten-4 border-radius-sm border-1 grey-border border-lighten-1">
            <div class="col s12">
              <div class="col s12">
                <p class = "text-heading">
                  Q{{ i + 1 }}
                </p>
                <p class="text-bold blue-text text-darken-2" style=" padding: 5px 2px; " >
                  {{ q.question }}
                </p>
              </div>
            </div>
          <div v-for = "(answer, index) in q.answers" :key = "index" class = "padding-1">
            <a @click = "tickAnswer(index , i)" 
            class="col s9 padding-2 clicker grey-border border-1 border-lighten-1 border-radius-sm "
            style = "margin-bottom: 3px !important"
            :class = "[{ 'blue white-text': answer.correct }]">
              {{ answer.answer }}
              <span v-if = "answer.correct" class="el-icon-check right" />
            </a>
            <el-button  icon = "el-icon-delete" round type = "danger" class = "right"
            @click = "deleteAnswer(index, i)"/>
          </div>
        </div>
        </div>
      </div>
      </div>
		</div>
	</div>
</template>

<script>
export default {

  name: 'quiz',

  data () {
    return {
    	question: '',
    	answer: '',
    	answers : [],
      questions : [],
    }
  },
  watch: {
  	answers: {
  		deep: true, 
  		immediate: true,
  		handler(val){
  			this.$emit('input', {
  				question: this.question,
  				answers: val
  			});
  		}
  	}
  },
  methods: {
  	addAnswer() {
  		if(!this.answer || !this.answer.length){
  			this.$message({
  				message: 'You cant add an empty answer',
  				type: 'error',
  			});
  			return;
  		}
  		let i;
  		for( i = 0; i < this.answers.length; i ++) {
  			if( this.answers[i].answer === this.answer){
  				this.$message({
	  				message: 'You cant add an answer twice',
	  				type: 'error',
	  			});
	  			return;
  			}
  		}
  		this.answers.push({
  			answer : this.answer , 
  			correct: !this.answers.length,
  			explain: 'Foo Bars',
  		})
  	},
  	tickAnswer(index, ind) {
  		let i;
  		for (i = 0; i < this.questions[ind].answers.length; i ++) {
  			this.questions[ind].answers[i].correct = index === i;
  		}
  	},
    addQuestion() {
      this.questions.push({ question : this.question, answers: this.answers });
      this.answers = [];
      this.answer = ''
      this.question = ''
    },
  	deleteAnswer(index, ind) {
      if(this.questions[ind].answers.length == 1) {
        this.questions.splice(ind, 1);
        return;
      }
  		if (this.questions[ind].answers[index].correct){
  			let i = 0;
  			for( i = 0; i < this.answers.length; i ++) {
  				if(i !== index) {
  					this.questions[ind].answers[i].correct = true;
  					this.questions[ind].answers.splice(index,1);
  					return;
  				}
  			}
  			this.questions[ind].answers.splice(index,1);
  		} else {
  			this.questions[ind].answers.splice(index,1);
  		}
  	}
  }
}
</script>

<style lang="css" scoped>
.clicker{
	cursor: pointer;
}
</style>