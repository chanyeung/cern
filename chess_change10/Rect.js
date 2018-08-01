/*사각형을 정의한다*/
var Rect = function(content,bg,x,y){
	this.content = content;	//장차 붙여질 div or container
	this.div;
	this.bg = bg;	//[java] setter injection <-보관하려고
	var bg_mem=this.bg;	//흰색 검은색을 저장할 변수[말을클릭할때 판이 하늘색,적색으로 변했다 복귀하기 위함]
	this.x =x;	//초기x좌표
	this.y = y;	//초기 y좌표

	this.indexY;//말의 현재위치보관,y축
	this.indexX;//말의 현재위치보관,x축
	this.my;	//말의 y축으로 이동할 값
	this.mx;	//말의 x축으로 이동할 값
	var me = this;
	//사각형으로서 갖추어야할 특징들을 세팅
	this.init=function(){
		this.div = document.createElement("div");	//외부에서 접근할수 있으면 클래스 변수인 this.div
		//var.div = document.createElement("div");	//외부에서 접근할수 없는  변수 var.div
		this.div.style.width  = 50+"px";
		this.div.style.height  = 50+"px";
		this.div.style.background = this.bg;
		//위치
		this.div.style.position = "absolute";
		this.x2 = this.x*50;
		this.y2 = this.y*50;
		this.div.style.left = this.x2+"px";//호출하는자가 정하도록
		this.div.style.top = this.y2+"px";//호출하는자가 정하도록

		//html에 뿌리기위해 appenChild를 하고 어디에다가 뿌릴지 정하지 않았으므로 변수[content]로 받자
		this.content.appendChild(this.div);
	}
	
	//arrayY:배열의 인덱스y, arrayX:배열의 인덱스x,my:y축으로 몇칸이동, mx:x축으로 몇칸이동
	this.mouse = function(arrayY,arrayX,my,mx,iy,ix){//y,x,my,mx,iy,ix	
		//체스를 클릭하여 색이변경된 곳을 누르면(온클릭)!!
		//말의 좌표를 클릭한 곳(->)으로 이동
		
		this.div.addEventListener("click",function move(){
			//상대의 말을 죽이자
			if (iy<2&&(ix<16))
			{
				malArray[iy][ix].stop(iy,ix);
			}
			//현재 선택한 말[marArray[arrayY][arrayX]]을 이동
			malArray[arrayY][arrayX].move(my,mx);
			me.div.style.background = bg_mem;
		});
			//alert(arrayY);
			//alert(arrayX);
				
	}
/*	this.move=function(arrayY,arrayX,my,mx,t){
		for (var i=0;i<boardArray.length ;i++ )
		{
			for (var a=0;a<boardArray[i].length ;a++ )
			{
				boardArray[i][a].div.removeEventListener("click",t);
			}
		}
		malArray[arrayY][arrayX].move(my,mx);
		
	}
*/
}