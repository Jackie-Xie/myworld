
//创建空的二维数组，用于存放落子情况
var chessBoard = [];

//me 代表是黑子还是白子，true黑子，false白子
var me = true;

//over标识棋局有没有结束
var over = false;

//赢法数组
var wins = [];

//赢法的统计数组
var myWin = [];
var youWin = [];

//赢法种类的索引，所有赢法种类, 15*15的棋盘count总共572
var count = 0;

//初始化落子情况
for(var i=0; i<15; i++){
	chessBoard[i] = [];
	for (var j=0; j<15; j++) {
		chessBoard[i][j] = 0;
	}
}


//初始化赢法数组,三维数组，前两维是坐标，最后是赢法种类
for(var i=0; i<15; i++){
	wins[i] = [];
	for (var j=0; j<15; j++) {
		wins[i][j] = [];
	}
}


//统计所有横向赢法                               //第一种赢法              //第二种赢法        //以此类推...
for (var i=0; i<15; i++) {                       //wins[0][0][0] = true;   //wins[0][1][1] = true;
	for(var j=0;j<11; j++){                      //wins[0][1][0] = true;   //wins[0][2][1] = true;
		for(var k=0; k<5; k++){                  //wins[0][2][0] = true;   //wins[0][3][1] = true;
			wins[i][j+k][count] = true;          //wins[0][3][0] = true;   //wins[0][4][1] = true;
		}                                        //wins[0][4][0] = true;   //wins[0][5][1] = true;
		count++;
	}
	
}

//统计所有纵向赢法  
for (var i=0; i<15; i++) {
	for(var j=0;j<11; j++){
		for(var k=0; k<5; k++){
			wins[j+k][i][count] = true;
		}
		count++;
	}
	
}

//统计所有斜线赢法  
for (var i=0; i<11; i++) {
	for(var j=0;j<11; j++){
		for(var k=0; k<5; k++){
			wins[i+k][j+k][count] = true;
		}
		count++;
	}
	
}


//统计所有反斜线赢法  
for (var i=0; i<11; i++) {
	for(var j=14;j>3; j--){
		for(var k=0; k<5; k++){
			wins[i+k][j-k][count] = true;
		}
		count++;
	}
	
}

//初始化赢法的统计数组
for(var i=0; i<count; i++){
	myWin[i] = 0 ;
	youWin[i] = 0 ;
}


//获取canvas对象
var chess = document.getElementById('chess');

//获取Context对象
var context = chess.getContext('2d');

//定义描边画笔颜色
context.strokeStyle = "#BFBFBF";

//画一张图在棋盘，形成水印
var logo = new Image();

logo.src = "images/alphaGo.jpg";

logo.onload = function () {
	context.drawImage(logo,0,0,670,670);
    drawChessBoard();
}

//画出棋盘
var drawChessBoard = function ()  {
		for(var i = 0; i < 15; i ++){
		context.moveTo(20 + i * 45,20);
		context.lineTo(20 + i * 45,655);
		context.stroke();
		context.moveTo(20,20 + i * 45);
		context.lineTo(655,20 + i * 45);
		context.stroke();
	}
}


//落子逻辑实现
var oneStep = function(i,j,me){
	context.beginPath();
    context.arc(20+i*45,20+j*45,20,0,2*Math.PI);
    context.closePath();
    var gradient = context.createRadialGradient(20+i*45+8,20+j*45-8,20,20+i*45,20+j*45,0);
    if(me){
    	gradient.addColorStop(0,"#0A0A0A");
    	gradient.addColorStop(1,"#636766");
    }else{
    	gradient.addColorStop(0,"#D1D1D1");
    	gradient.addColorStop(1,"#F9F9F9");
    }
    //定义填充画笔颜色
    context.fillStyle = gradient;
    context.fill();
}


//画布上的每个像素点的点击事件
chess.onclick = function(e){
	if(over){
		return;  //游戏结束
	}
	var x = e.offsetX;
	var y = e.offsetY;
	var i = Math.floor(x / 45);
	var j = Math.floor(y / 45);
	if(chessBoard[i][j] == 0){
		oneStep(i,j,me);
		if(me){
			chessBoard[i][j] = 1;
			//遍历所有可能赢法，看哪个先被实现
			for(var k = 0; k < count; k++){
				if(wins[i][j][k]){
					myWin[k]++;		//黑棋在第k种赢法上前进了一步
					youWin[k]	= 6;  //最大5，6不计算入分数
					if(myWin[k] == 5){   //第k种赢法被实现，所以赢了
						window.alert("黑棋赢了！");
						over = true;
					}
				}
			}
			if(!over) {
				me = !me;				
			}	
		}else{
			chessBoard[i][j] = 2;
			//遍历所有可能赢法，看哪个先被实现
			for(var k = 0; k < count; k++){
				if(wins[i][j][k]){
					youWin[k]++;		//白棋在第k种赢法上前进了一步
					myWin[k]	= 6;  //最大5，6不计算入分数
					if(youWin[k] == 5){   //第k种赢法被实现，所以赢了
						window.alert("白棋赢了！");
						over = true;
					}
				}
			}
			if(!over) {
				me = !me;
				
			}	
		}				
	}    
}