#include <iostream>

using namespace std;
int lampu[1000], c[1000000],g[1000],t,e;


int main(){
	cin >> t;
	for (int y =0;y<t; y++ ){
	cin >> lampu[y];
	e=1;
	
	for (int o=0;o<lampu[y];o++){
		c[o] = 0;
	}
	
	while (e<(lampu[y]+1)){
		for (int v=0;v<lampu[y];v++){
		if (c[v] < 1 ){
		c[v] += !((v+1)%e);
		
}else{
		c[v] -= !((v+1)%e);
	}
}
		e++;
	
}
	for (int a=0;a<lampu[y];a++){
		if (c[a] > 0){
			g[y] += 1;
		}
	}

}
	for (int s=0;s<t;s++){
	
	cout << g[s] << "\n";
}
	return 0;
}




