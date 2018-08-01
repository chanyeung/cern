var Pawn = function(){
	var me=this;
	this.f=true;
	this.team =this.src.substr(0,5);
	this.WCount=0;	//앞에 하얀말이 없는지 체크하기 위함, 상대개수만큼 앞에 적확인
	this.BCount=0;	//앞에 검은말이 없는지 체크하기 위함, 상대개수만큼 앞에 적확인
	this.RCount=0;	//	//Reset Count 대각선으로 공격및 이동이 가능한지를 판단하기 위한 변수
	this.jump = true; //2칸앞에 상대가 있으면 false로 전환하여 2칸이동을 막는 변수

	//white : malArray[0]:king~malArray[15]:pawn8
	this.sel=function(arrayY,arrayX,positionY,positionX){
		me.arrayX= arrayX;
		(me.team=="white")?me.whiteSel(arrayY,arrayX,positionY,positionX):me.blackSel(arrayY,arrayX,positionY,positionX);
	}
	this.whiteSel=function(arrayY,arrayX,positionY,positionX){	
		//alert(turn);
		if((turn%2)==0){
			//this.x0~350 this.y=300에서 클릭한 쫄병의 좌우에 적이있는지 확인하고 있으면 해당하는곳을 블루라이트
			//[첫턴이면 +50인 앞칸과 +100인 앞앞칸]없으면 this.y에 +50인 앞칸에 파란불
			me.WCount=0;	//whiteteam count	흰말이 바로 앞한칸을 막고있는지 확인하기 위한 변수
			me.BCount=0;	//Blackteam count 검은말이 바로 앞한칸을 막고있는지 확인하기 위한 변수
			me.RCount = 0;	//Reset Count 대각선으로 공격및 이동이 가능한지를 판단하기 위한 변수 [대각선이동이가능하면 증가][앞으로 이동이 불가능하고 턴다시주어지게(turnStart)]
			jump=true;
			
			//앞과 대각선에 적이있는지 비교!
			for (var i =0;i<malArray[1].length ;i++ )
			{
				me.BCount++;
				//console.log(i+"번쨰 malArray[1][i].y:"+malArray[1][i].y+", x:"+malArray[1][i].x);
				//else if 앞에 상대방 있냐(못움직임)//예외는 대각선에 상대말이 있을때
				if(malArray[1][i].y==positionY-1&&(malArray[1][i].x>=positionX-1&&malArray[1][i].x<=positionX+1)){
					//if대각선 좌측에 상대말이 있냐?[↖으로 이동 및 상대말 죽이기]
					if(malArray[1][i].y==positionY-1&&malArray[1][i].x==positionX-1){
						/*(현재 선택한 말의 y좌표,/선택한 말의 x좌표, 
						선택한말의  y축으로 움직일 칸수,/x축으로 움직일 칸수
						제거할 말이 들어있는 배열의 2차원 인덱스=white팀의경우 1(black팀의 경우 상대방인0),/1차원 인덱스=i)
						*/
						//alert("↖으로 이동 및 상대말 죽이기 및 이동");
						me.RCount++;
						setBoard(arrayY,arrayX,positionY,positionX,-1,-1,1,i);	
						
					}
					//else if대각선 우측에 상대말이 있냐?[↗으로 이동 및 상대말 죽이기]
					else if(malArray[1][i].y==positionY-1&&malArray[1][i].x==positionX+1){
						//alert("↗으로 이동 및 상대말 죽이기 및 이동");
						//상대말 없애기 kill
						me.RCount++;
						setBoard(arrayY,arrayX,positionY,positionX,-1,1,1,i);
					}
					else{
						me.BCount--;
					}
				}
				//두칸 앞에 적이있는지 확인
				else if(malArray[1][i].y==positionY-2&&malArray[1][i].x==positionX){
					jump = false;
				}
				/*앙파상
				흰색 폰이 5번 랭크에 있고 검정색 폰이 처음 2칸 전진을 하면 흰색 폰은 검정색 폰을 잡을 수 없지만 
				앙파상을 이용해 대각선으로 이동하면서 검정색 폰을 넘은 규칙으로 검정색 폰을 잡을 수 있는 규칙이다. 
				일반적인 폰이 대각선으로 피스를 잡는 "x"를 쓰지만 모를 수도 있으므로 명시할 경우 기호인 "e.p."로 표기한다.
				*/
				else if(positionY==3){
					if(malArray[1][i].y==positionY&&malArray[1][i].x == positionX-1){
						me.RCount++;
						setBoard(arrayY,arrayX,positionY,positionX,-1,-1,1,i);
					}else if(malArray[1][i].y==positionY&&malArray[1][i].x == positionX+1){
						me.RCount++;
						setBoard(arrayY,arrayX,positionY,positionX,-1,1,1,i);
					}
				}
			}
			for (var i =0;i<malArray[0].length ;i++ ){
				me.WCount++;
				//앞칸에 우리팀말이 있냐?
				if(malArray[0][i].y==positionY-1&&malArray[0][i].x==positionX){
					me.WCount--;
				}
				else if(malArray[0][i].y==positionY-2&&malArray[0][i].x==positionX){
					jump = false;
				}
			}
			//앞으로 이동
			if(me.BCount==malArray[1].length &&me.WCount==malArray[0].length){
				//[앞으로이동!!]
				//if현재위치가 [y축이  6이냐?] -> 앞으로 한칸,두칸 이동가능
				this.f=true;
				if(positionY==6&&jump){
					//앞으로 2칸이동
					setBoard(arrayY,arrayX,positionY,positionX,-2,0,2,16);
				}
				//한칸 이동가능
				setBoard(arrayY,arrayX,positionY,positionX,-1,0,2,16);//(malArray[x][y]->x와 y인덱스를 줘야됨)	
			}
			else if(me.RCount==0)
			{
				//이동못하니까 다시 다른말을 선택 다시가능하도록 turnStart()함수 다시호출
				turnStart();
			}
		}
	}
	//black : malArray[16]:king~malArray[31]:pawn8
	this.blackSel=function(arrayY,arrayX,positionY,positionX){	
		//alert(turn);
		if((turn%2)==1){
			//this.x0~350 this.y=300에서 클릭한 쫄병의 좌우에 적이있는지 확인하고 있으면 해당하는곳을 블루라이트
			//[첫턴이면 +50인 앞칸과 +100인 앞앞칸]없으면 this.y에 +50인 앞칸에 파란불
			me.WCount=0;	//whiteteam count	흰말이 바로 앞한칸을 막고있는지 확인하기 위한 변수
			me.BCount=0;	//Blackteam count 검은말이 바로 앞한칸을 막고있는지 확인하기 위한 변수
			me.RCount = 0;	//Reset Count 대각선으로 공격및 이동이 가능한지를 판단하기 위한 변수 [대각선이동이가능하면 증가][앞으로 이동이 불가능하고 턴다시주어지게(turnStart)]
			jump=true;
			
			//앞과 대각선에 적이있는지 비교!
			for (var i =0;i<malArray[0].length ;i++ )
			{
				me.WCount++;
				//console.log(i+"번쨰 malArray[1][i].y:"+malArray[1][i].y+", x:"+malArray[1][i].x);
				//else if 앞에 상대방 있냐(못움직임)//예외는 대각선에 상대말이 있을때
				if(malArray[0][i].y==positionY+1&&(malArray[0][i].x>=positionX-1&&malArray[0][i].x<=positionX+1)){
					//if대각선 좌측에 상대말이 있냐?[↖으로 이동 및 상대말 죽이기]
					if(malArray[0][i].y==positionY+1&&malArray[0][i].x==positionX-1){
						/*(현재 선택한 말의 y좌표,/선택한 말의 x좌표, 
						선택한말의  y축으로 움직일 칸수,/x축으로 움직일 칸수
						제거할 말이 들어있는 배열의 2차원 인덱스=white팀의경우 1(black팀의 경우 상대방인0),/1차원 인덱스=i)
						*/
						//alert("↖으로 이동 및 상대말 죽이기 및 이동");
						me.RCount++;
						setBoard(arrayY,arrayX,positionY,positionX,1,-1,0,i);	
					}
					//else if대각선 우측에 상대말이 있냐?[↗으로 이동 및 상대말 죽이기]
					else if(malArray[0][i].y==positionY+1&&malArray[0][i].x==positionX+1){
						//alert("↗으로 이동 및 상대말 죽이기 및 이동");
						//상대말 없애기 kill
						me.RCount++;
						setBoard(arrayY,arrayX,positionY,positionX,1,1,0,i);
					}
					else{
						me.WCount--;
					}
				}
				//두칸 앞에 적이있는지 확인
				else if(malArray[0][i].y==positionY+2&&malArray[0][i].x==positionX){
					jump = false;
				}
				/*앙파상
				흰색 폰이 5번 랭크에 있고 검정색 폰이 처음 2칸 전진을 하면 흰색 폰은 검정색 폰을 잡을 수 없지만 
				앙파상을 이용해 대각선으로 이동하면서 검정색 폰을 넘은 규칙으로 검정색 폰을 잡을 수 있는 규칙이다. 
				일반적인 폰이 대각선으로 피스를 잡는 "x"를 쓰지만 모를 수도 있으므로 명시할 경우 기호인 "e.p."로 표기한다.
				*/
				else if(positionY==4){
					if(malArray[0][i].y==positionY&&malArray[0][i].x == positionX-1){
						me.RCount++;
						setBoard(arrayY,arrayX,positionY,positionX, 1,-1,0,i);
					}else if(malArray[0][i].y==positionY&&malArray[0][i].x == positionX+1){
						me.RCount++;
						setBoard(arrayY,arrayX,positionY,positionX, 1, 1,0,i);
					}
				}
			}
			//아래칸에 우리팀말이 있냐?
			for(var i =0; i<malArray[1].length;i++){
			me.BCount++;
				if(malArray[1][i].y==positionY+1&&malArray[1][i].x==positionX){
					me.BCount--;
				}
				else if(malArray[1][i].y==positionY+2&&malArray[1][i].x==positionX){
					jump=false;
				}
			}
				
			if(me.WCount==malArray[0].length&&me.BCount==malArray[1].length){
				//[앞으로이동!!]
				//if현재위치가 [y축이  6이냐?] -> 앞으로 한칸,두칸 이동가능
				this.f=true;
				if(positionY==1&&jump){
					//앞으로 2칸이동
					setBoard(arrayY,arrayX,positionY,positionX,2,0,2,16);
				}
				//else앞으로 한칸 이동가능
				setBoard(arrayY,arrayX,positionY,positionX,1,0,2,16);//(malArray[x][y]->x와 y인덱스를 줘야됨)	
				
			}else if(me.RCount==0)
			{
				//이동못하니까 다시 다른말을 선택 다시가능하도록 turnStart()함수 다시호출
				turnStart();
			}
		}
	}
	//말을 움직이자
	this.move = function(my,mx){
		
		if(me.y!=6&&me.team=="white"){
			my=-1;
		}else if(me.y!=1&&me.team=="black"){
			my=1;
		}
			

		if(this.f){
			this.f=false;
			this.y+=my;
			this.x+=mx;
			this.y2 = this.y*50;
			this.x2 = this.x*50;
			this.img.style.left = this.x2+"px";
			this.img.style.top = this.y2+"px";
			
			if(this.y==0||this.y==7){
				this.promote();
			}
		}
	}

	this.stop=function(iy,ix){
		this.stage.removeChild(this.img);
		malArray[iy].splice(ix,1);	//명단에서 제거
	}

	/*프로모션
	폰이 상대방 진영 끝 랭크까지 갔을때 킹,폰을 제외한 퀸,룩,비숍,나이트 피스로 프로모션 할 수 있다. 
	보통 폰은 퀸으로 프로모션하지만 다른 피스를 선택하는 것을 언더프로모션이라고 한다. 
	프로모션하는 피스의 개수 제한은 없다. 단, 폰은 프로모션 후, 그 자리에서 다른 말로 변한 다음, 상대방의 차례 후, 움직일 수도 있다. 
	단, 킹이 체크 상태에 있을 경우에는 킹을 피하거나, 공격을 막거나, 체크 하는 기물을 잡는다. 즉, 관련된 것을 한다.
	*/
	this.promote= function(){
		/*퀸
		var mal = new Mal(stage,me.team+"_queen.png",me.x,me.y,50,50,me.indexY,me.indexX);
		mal.init();
		Queen.prototype = mal;
		queen = new Queen();
		malArray[me.indexY].push(queen);
		*/
		alert("승진 어렵다");
		//(me.indexY==0)?whiteArray[me.indexX]="WQueen":blackArray[me.indexX]="BQueen";
	}
}