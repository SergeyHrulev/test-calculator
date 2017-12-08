<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Calc</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height" id="app">
    <div class="content">
        <div class="title m-b-md">
            Калькулятор
        </div>
        <div class="col-lg-10 col-lg-offset-1">
            {{--<div class="form-group">--}}
            {{--<textarea class="form-control" name="result" id="result" cols="50" rows="5" placeholder="Результаты вычислений">--}}

            {{--</textarea>--}}
                {{--</div>--}}
            <div class="jumbotron">
                <p v-show="number1">@{{ number1 }}</p>
                <p v-show="number2">@{{ number2 }}</p>
                <p v-show="itog">@{{ itog }}</p>
            </div>
            <div class="form-inline">
                <input type="text" v-model="number" value="" placeholder="Введите число" class="form-control">
                <button v-show="number1" class="btn btn-primary" @click="resultFunc"> = </button>
            </div>
            <div class="form-group" style="margin: 20px 0;">
                <button class="btn" @click="sumFumc">+</button>
                <button class="btn" @click="subFunc">-</button>
                <button class="btn" @click="multFunc">*</button>
                <button class="btn" @click="divFunc">/</button>
            </div>
        </div>
    </div>
</div>
<script src="{{ mix('js/app.js') }}"></script>
<script>
    const app = new Vue({
        el: '#app',
        data:{
            number1: '',
            number2: '',
            calc: '',
            number: '',
            itog: ''
        },
        created(){
          this.number1 = this.number1;
            this.number2 = this.number2;
            this.calc = this.calc;
            this.itog = this.itog;
        },
        methods: {
            addNumber: function () {
                if (this.number1 == ''){
                    this.number1 = this.number;
                }else {
                    this.number2 = this.number;
                }
                this.number = '';
            },
            sumFumc: function () {
                this.calc = 'summ';
                this.addNumber();
;            },
            subFunc: function () {
                this.calc = 'substract';
                this.addNumber();
            },
            multFunc: function () {
                this.calc = 'multiple';
                this.addNumber();
            },
            divFunc: function () {
                this.calc = 'division';
                this.addNumber();
            },
            resultFunc: function (data) {
                this.number2 = this.number;
                this.number = '';
                const test = this;
                axios.post('/test', {
                  number1: this.number1,
                  number2: this.number2,
                  calc: this.calc
              })
                      .then(function (responce) {
                          test.itog = responce.data;
                      })
                      .catch(function (error) {
                          console.log(error);
                      });
//                this.number1 = '';
//                this.number2 = '';
//                this.calc = '';
            }
        }
    });
</script>
</body>
</html>
