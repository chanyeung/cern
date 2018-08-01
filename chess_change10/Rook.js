var Rook = function(){

	var me=this;
	this.f=true;
	this.team =this.src.substr(0,5);
	this.RCount=0;	//	//Reset Count 대각선으로 공격및 이동이 가능한지를 판단하기 위한 변수


	this.sel=function(arrayY,arrayX,positionY,positionX){
		me.Rcount=0;
		//a= -1:위쪽 한칸, 0:y축으로 같은위치, 1:아래쪽 한칸
		for(var a=1;a<8;a++){
			a+=serchMal(arrayY,arrayX,positionY,positionX,-a,0);	//상
		}
		for(var a=1;a<8;a++){
			a+=serchMal(arrayY,arrayX,positionY,positionX,0,-a);		//좌
		}
		for(var a=1;a<8;a++){
			a+=serchMal(arrayY,arrayX,positionY,positionX,0, a);		//우
		}
		for(var a=1;a<8;a++){
			a+=serchMal(arrayY,arrayX,positionY,positionX,a, 0);		//하
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
	/*캐슬링(Castling)
	캐슬링(Castling)은 체스의 룰의 하나이다. 킹과 룩을 한 번에 동시에 움직이는 특수한 수를 가리킨다.
	캐슬링은 각 플레이어에게 1회의 게임 중에 1번만 사용할 수 있는 권리이다. 매우 효율이 좋은 수이기에 거의 모든 플레이어가 자주 사용하고 있다. 하지만 편리한 반면 이 수는 지키지 않으면 안 되는 조건(제약)도 많다.
	체스에 있어서 자신의 피스를 한 번에 2개를 움직이는 수는 캐슬링 이외에 존재하지 않는다. 캐슬링은 의무는 아니지만 거의 모든 게임에서 화이트와 블랙 모두 빈번히 사용하고 있다. 하지만 이 사용에 관해서는 몇 가지 조건(제약)이 있다.

	킹과 캐슬링하는 측의 룩 모두가 초기배치에서 움직인 적이 있으면 안 된다.
	킹과 캐슬링하는 측의 룩 사이에 다른 피스가 있어서는 안 된다.
	현재 킹이 체크되어 있거나 현재 킹이 통과 하는 칸에 피스가 공격/이동이 가능해서는 안 된다.
	*/
}