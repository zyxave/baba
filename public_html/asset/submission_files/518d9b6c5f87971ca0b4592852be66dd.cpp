#include <iostream>

using namespace std;
int lampu[1000], c[1000000],g[1000],t;

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
	cin >> t;
	for (int y =0;y<t; y++ ){
	cin >> lampu[y];
	int i,a,e = 1,d;
	
	while (e<(lampu[y]+1)){
		saklar(e,lampu[y]);
		e++;
	}
	for (a=0;a<lampu[y];a++){
		if (c[a] > 0){
			g[y]++;
		}
	}
	for (int s=0;s<t;s++){
	
	cout << g[s];
}
	
	return 0;
}
}
