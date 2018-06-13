#include <iostream>
using namespace std ;

int main(){
	int t,T ;
	int b[100][100];
	int d[100];
	cin >> t ;
	for (int a=0 ; a<=t ; a++ ){
		cin >>b[a][a] >> b[a][a+1];
}
	cin >> T;
	for (int a = 0 ; a<=T ; a++){
		cin >> d[a] ;
		for (int s = 0;s<T;s++){
			if (d[a] == b[s][s]){
				cout << b[s][s+1];
			}	
		}
		 
	}
	return 0;
}
