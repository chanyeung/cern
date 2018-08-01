var Mal = function(stage,src,x,y,width,height,indexY,indexX){
	this.stage=stage;
	this.img;
	this.src = src;
	this.x =x;
	this.y =y;
	this.width=width;
	this.height=height;
	this.velX=0;	//움직일 보폭을 결정
	this.velY=0;	//움직일 보폭을 결정
	this.indexY=indexY;
	this.indexX=indexX;
	var me = this;
	//this.team = src.substr(0,5);

	this.init=function(){
		this.img = document.createElement("img");
		this.img.src = this.src;
		this.img.style.position = "absolute";	
		this.x2 = 50*this.x;
		this.y2 = 50*this.y;
		this.img.style.left = this.x2+"px";
		this.img.style.top = this.y2+"px";
		this.img.style.width = this.width+"px";
		this.img.style.height = this.height+"px";
		
		this.stage.appendChild(this.img);
		
	}
	this.sel = function(){
	
	}
	this.move = function(){
		//console.log("x축은:"+this.x+", y축은:"+this.y+":src는?"+this.src);
	}
}