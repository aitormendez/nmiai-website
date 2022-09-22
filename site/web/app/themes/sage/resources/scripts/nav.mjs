import gsap from "gsap";

export class nav {
  constructor() {
    this.closed = true;
    this.btnDot = document.getElementById("btnDot");
    this.mainMenu = document.getElementById("main-menu");
    this.radio = Math.round(Math.hypot(window.innerWidth, window.innerHeight));
    console.log(this.radio);

    this.btnDot.addEventListener("click", () => {
      this.closed ? this.openDot() : this.closeDot();
    });

    window.addEventListener("resize", () => {
      this.radio = Math.round(
        Math.hypot(window.innerWidth, window.innerHeight)
      );
    });
  }

  openDot() {
    gsap.to(this.mainMenu, {
      overwrite: true,
      clipPath: `circle(${this.radio}px at calc(100% - 1.5rem) 1.5rem)`,
      duration: 0.5,
    });

    gsap.to(this.btnDot, {
      overwrite: true,
      backgroundColor: "white",
      duration: 0.5,
    });

    this.closed = false;
  }

  closeDot() {
    gsap.to(this.mainMenu, {
      overwrite: true,
      clipPath: "circle(0.5rem at calc(100% - 1.5rem) 1.5rem)",
      duration: 0.5,
    });

    gsap.to(this.btnDot, {
      overwrite: true,
      backgroundColor: "black",
      duration: 0.5,
    });

    this.closed = true;
  }
}
