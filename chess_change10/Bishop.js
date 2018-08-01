var Bishop = function(){

	var me=this;
	this.f=true;
	this.team =this.src.substr(0,5);
	this.RCount=0;	//	//Reset Count 대각선으로 공격및 이동이 가능한지를 판단하기 위한 변수


	this.sel=function(arrayY,arrayX,positionY,positionX){
		me.Rcount=0;
		//a= -1:위쪽 한칸, 0:y축으로 같은위치, 1:아래쪽 한칸
		for(var a=1;a<8;a++){
			a+=serchMal(arrayY,arrayX,positionY,positionX,-a,-a);	//좌상
		}
		for(var a=1;a<8;a++){
			a+=serchMal(arrayY,arrayX,positionY,positionX,-a,a);	//우상
		}
		for(var a=1;a<8;a++){
			a+=serchMal(arrayY,arrayX,positionY,positionX,a,-a);		//좌하
		}
		for(var a=1;a<8;a++){
			a+=serchMal(arrayY,arrayX,positionY,positionX,a, a);		//우하
		}
		if(me.RCount==0)
		{
			//이동못하니까 다시 다른말을 선택 다시가능하도록 turnStart()함수 다시호출
			turnStart();
		}
	}

	//말을 움직이자
	this.move = function(my,mx){
			
		if(this.f){
			this.f=false;
			this.y+=my;
			this.x+=mx;
			this.y2 = this.y*50;
			this.x2 = this.x*50;
			this.img.style.left = this.x2+"px";
			this.img.style.top = this.y2+"px";

		}
	}

	this.stop=function(iy,ix){
		this.stage.removeChild(this.img);
		malArray[iy].splice(ix,1);	//명단에서 제거
	}
}