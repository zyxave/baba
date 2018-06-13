#include <iostream>
using namespace std ;

int main (){
	int n,t ,a,b ,sum=0 ;
	cin >> n;
	while (n--){
		cin >> a >> b ;
		while (a<b){
		
		int c,d ;
		c = a / 10 ;
		d = a % 10 ;
		if (c==d) {
			sum++ ;
		}
		a+= 1;
	}
	cout << sum ;
	}
	return 0 ;
}

