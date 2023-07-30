<template>
  <div class="container">
    <div class="result">
      {{ calculation }}
    </div>
    <div class="display" v-if="result !== 'Error'">
      {{ result }}
    </div>
    <div class="display" v-if="result === 'Error'" style="color: red;">
      {{ result }}
    </div>
    <div class="buttons">
      <button type='button' class="button-grey" @click="setOperator('%')">%</button>
      <button type='button' class="button button-delete" @click="clearAll()">CE</button>
      <button type='button' class="button button-delete" @click="clear()">C</button>
      <button type='button' class="backspace button-delete" @click="backspace()">&larr;</button>
      <button type='button' class="button" @click="appendToResult('7')">7</button>
      <button type='button' class="button" @click="appendToResult('8')">8</button>
      <button type='button' class="button" @click="appendToResult('9')">9</button>
      <button type='button' class="button button-operation" @click="setOperator('/')">÷</button>
      <button type='button' class="button" @click="appendToResult('4')">4</button>
      <button type='button' class="button" @click="appendToResult('5')">5</button>
      <button type='button' class="button" @click="appendToResult('6')">6</button>
      <button type='button' class="button button-operation" @click="setOperator('*')">x</button>
      <button type='button' class="button" @click="appendToResult('1')">1</button>
      <button type='button' class="button" @click="appendToResult('2')">2</button>
      <button type='button' class="button" @click="appendToResult('3')">3</button>
      <button type='button' class="button button-operation" @click="setOperator('-')">-</button>
      <button type='button' class="button" @click="toggleSign()">+/-</button>
      <button type='button' id="zero" class="button" @click="appendToResult('0')">0</button>
      <button type='button' class="button" @click="appendToResult('.')">.</button>
      <button type='button' class="button button-operation" @click="setOperator('+')">+</button>
      <button type='button' class="button button-equal" @click="calculate()">=</button>
    </div>
  </div>
</template>

<script>
export default {
  name: 'CalculatorApp',
  data() {
    return {
      result: '',
      calculation: '',
      errorTimeout: null,
      operator: '',
    };
  },
  methods: {
    appendToResult(value) {
      if (this.result === 'Error') {
        this.clear();
      }

      if (this.result === '' && ['*', '-', '+', '%', '0'].includes(value)) {
        return;
      }

      if (this.operator !== '' && ['*', '-', '+', '%'].includes(value)) {
        this.result = this.result.slice(0, -1) + value;
        this.operator = value;
      } else {
        this.result += value;
        this.operator = '';
      }
    },

    setOperator(operator) {
      switch (operator) {
        case '/':
          operator = '÷';
          break;
        case '*':
          operator = 'x';
          break;
      }

      if (this.operator !== '' && this.result !== '' && this.result.toString().slice(-1) !== operator) {
        this.result = this.result.slice(0, -1) + operator;
      } else if (this.result !== '' && this.result.toString().slice(-1) !== operator) {
        this.result += operator;
      }

      this.operator = operator;
    },

    calculate() {
      try {
        this.calculation = this.result;
        this.result = eval(this.result.replace(/÷/g, '/').replace(/x/g, '*'));

        if (typeof this.result === 'number') {
          this.result = parseFloat(this.result.toFixed(5));
        }
      } catch (error) {
        this.result = 'Error';
        this.errorTimeout = setTimeout(() => {
          this.result = '';
          this.calculation = '';
          clearTimeout(this.errorTimeout);
        }, 500);
      }

      if (!this.result) {
        this.result = '';
      }
    },

    clear() {
      this.result = '';
      this.operator = '';
    },

    clearAll() {
      this.result = '';
      this.calculation = '';
      this.operator = '';
    },

    backspace() {
      this.result = this.result.toString().slice(0, -1);

      if (this.result === 'Error') {
        this.clear();
      }

      this.operator = ['÷', '*', '-', '+', '%'].includes(this.result.slice(-1)) ? this.result.slice(-1) : '';
    },

    toggleSign() {
      if (this.result === '' || this.result === '-') {
        return;
      }

      if (this.result[0] === '-') {
        this.result = this.result.toString().slice(1);
      } else if (parseFloat(this.result) < 0) {
        this.result = this.result.toString().slice(1);
      } else {
        this.result = `-${this.result}`;
      }
    },
  },
};
</script>

<style>
html{
  background-color: #82afb3;
}
*{
  font-family: 'Century Gothic', sans-serif;
}
.container {
  border: none;
  width: 320px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  padding: 2px;
}
.result {
  font-size: 20px;
  text-align: right;
  padding: 10px 20px;
  background-color: white;
  height: 30px;
  display: flex;
  justify-content: flex-end;
  align-items: center;
}

.display {
  height: 70px;
  display: flex;
  justify-content: flex-end;
  align-items: center;
  background-color: #fff;
  font-size: 36px;
  padding: 0 20px;
}

.buttons {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
}

button {
  font-size: 20px;
  background-color: #fff;
  color: black;
  padding: 20px;
  border-radius: 0;
  border: none;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

button:hover:not(.button-grey):not(.button-delete):not(.button-equal):not(.button-operation),
#zero:hover:not(.button-grey) {
  background-color: #f0f0f0;
}

.button-grey {
  background-color: #e0e0e0;
  color: black;
  border: none;
}
.button-delete{
  background-color: #d13e48;
  color: white;
}
.button-delete:hover{
  background-color: #aa353d;
}
.button-operation {
  background-color: rgb(60, 126, 122);
  color: #fff;
  border: none;
}
.button-operation:hover{
  background-color: rgb(48, 99, 95);
}
.button-equal{
  grid-column: 1/5;
  background-color: rgb(60, 143, 104);
  color: white;
}
.button-equal:hover{
  background-color: rgb(53, 114, 85);
}
</style>
