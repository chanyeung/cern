var King = function(){

	var me=this;
	this.f=true;
	this.team =this.src.substr(0,5);
	this.WCount=0;	//앞에 하얀말이 없는지 체크하기 위함, 상대개수만큼 앞에 적확인
	this.BCount=0;	//앞에 검은말이 없는지 체크하기 위함, 상대개수만큼 앞에 적확인
	this.RCount=0;	//	//Reset Count 대각선으로 공격및 이동이 가능한지를 판단하기 위한 변수
	this.jump = true; //2칸앞에 상대가 있으면 false로 전환하여 2칸이동을 막는 변수


	this.sel=function(arrayY,arrayX,positionY,positionX){
		me.RCount=0
		
		//a= -1:위쪽 한칸, 0:y축으로 같은위치, 1:아래쪽 한칸
		serchMal(arrayY,arrayX,positionY,positionX,-1,-1);
		serchMal(arrayY,arrayX,positionY,positionX,-1, 0);
		serchMal(arrayY,arrayX,positionY,positionX,-1, 1);
		serchMal(arrayY,arrayX,positionY,positionX, 0,-1);
		serchMal(arrayY,arrayX,positionY,positionX, 0, 1);
		serchMal(arrayY,arrayX,positionY,positionX, 1,-1);
		serchMal(arrayY,arrayX,positionY,positionX, 1, 0);
		serchMal(arrayY,arrayX,positionY,positionX, 1, 1);
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