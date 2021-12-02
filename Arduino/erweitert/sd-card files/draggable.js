Element.prototype.drag=function(){var t=function(t){this.style.left=t.clientX-this.dragStartX+"px",this.style.top=t.clientY-this.dragStartY+"px"}.bind(this),e=function(n){document.removeEventListener("mousemove",t),document.removeEventListener("mouseup",e)}.bind(this);this.addEventListener("mousedown",function(n){if(n.target.className==="header"||n.target.className==="title")n.preventDefault(),this.dragStartX=n.offsetX,this.dragStartY=n.offsetY,document.addEventListener("mousemove",t),document.addEventListener("mouseup",e)}.bind(this)),this.style.position="absolute"};

const CHART_COLORS = [
  'rgb(255, 99, 132)',
  'rgb(255, 159, 64)',
  'rgb(255, 205, 86)',
  'rgb(75, 192, 192)',
  'rgb(54, 162, 235)',
  'rgb(153, 102, 255)',
  'rgb(201, 203, 207)'
];

function namedColor(index) {
  return CHART_COLORS[index % CHART_COLORS.length];
}