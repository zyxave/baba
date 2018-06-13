#include <iostream>
using namespace std ;

int main(){
	int n ; 
	cin >> n ;
	while (n--){
		int p,a,m,r,sum=0 ;
		cin >> p >> a >> m >> r ;
		while(r>=p){
				if(p>m){
					r-=p ;
					p-=a ;
					sum++;
				}
				else if(p<=m){
					p=m ;
					r-=p ;
					sum++;
				}
		}
		cout << sum << endl ;
	}
	return 0;
}

