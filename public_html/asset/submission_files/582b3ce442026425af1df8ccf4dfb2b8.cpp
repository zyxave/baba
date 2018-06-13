#include <iostream>

using namespace std;
int lampu, c[1000000],g;

int saklar(int b,int h){
	for (int v=0;v<h;v++){
		if (c[v] < 1 ){
		c[v] += !((v+1)%b);
		
}else{
		c[v] -= !((v+1)%b);
		}
}
}
int main(){
	cin >> lampu;
	int i,a,e = 1,d;
	
	while (e<(lampu+1)){
		saklar(e,lampu);
		e++;
	}
	for (a=0;a<lampu;a++){
		if (c[a] > 0){
			g += 1;
		}
	}
	
	cout << g;
	
	
	return 0;
}
