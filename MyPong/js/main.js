'use strict';

(() => {
    function rand(min, max) {
        return Math.random() * (max - min) + min;
    }
    class Ball {
        constructor(canvas) {
            this.canvas = canvas;
            this.ctx = this.canvas.getContext('2d');
            this.x = rand(30, 250);
            this.y = 30;
            this.r = 10;
            // ↓"v"はvelocityのv, 速さの指定↓
            this.vx = rand(3, 5) * (Math.random() < 0.5 ? 1 : -1);
            this.vy = rand(3, 5);
        }

        update() {
            // ↓constructorの中で指定した速さでボールを動かす↓
            this.x += this.vx;
            this.y += this.vy;

            if (
                // ↓左の壁に当たった時↓
                this.x - this.r < 0 ||
                // ↓右の壁に当たった時↓
                this.x + this.r > this.canvas.width
            ) {
                // ↓方向転換↓
                this.vx *= -1;
            }

            if (
                this.y - this.r < 0 ||
                this.y + this.r > this.canvas.height
            ) {
                this.vy *= -1;
            }
        }

        draw() {
            this.ctx.beginPath();
            this.ctx.fillStyle = '#fdfdfd';
            // ↓" 0, 2 * Math.P" -> 0度から360度まで↓
            this.ctx.arc(this.x, this.y, this.r, 0, 2 * Math.PI);
            this.ctx.fill();
        }
    }

    class Paddle {
        constructor(canvas) {
            this.canvas = canvas;
            this.ctx = this.canvas.getContext('2d');
            this.w = 60;
            this.h = 16;
            this.x = this.canvas.width / 2 - (this.w / 2);
            this.y = this.canvas.height - 32;
        }

        update() {

        }

        draw() {
            this.ctx.fillStyle = '#fdfdfd';
            this.ctx.fillRect(this.x, this.y, this.w, this.h);
        }
    }

    class Game {
        constructor(canvas) {
            this.canvas = canvas;
            this.ctx = this.canvas.getContext('2d');
            this.ball = new Ball(this.canvas);
            this.paddle = new Paddle(this.canvas);
            this.loop();
        }

        loop() {
            this.update();
            this.draw();

            requestAnimationFrame(() => {
                this.loop();
            });
        }

        update() {
            this.ball.update();
            this.paddle.update();
        }

        draw() {
            // ↓動いたボールの奇跡をクリアにする, 範囲:左上からcanvasの右下まで↓
            this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height)
            this.ball.draw();
            this.paddle.draw();
        }

    }
    const canvas = document.querySelector('canvas');
    if (typeof canvas.getContext === 'undefined') {
        return;
    }

    new Game(canvas);
})();