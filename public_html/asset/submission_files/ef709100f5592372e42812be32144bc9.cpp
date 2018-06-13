#include <bits/stdc++.h>
using namespace std;

int main(){
	int p,a,m,r,tmp,kasus,sampai;
	cin>>sampai;
	for(kasus=0;kasus<sampai;kasus++){
	cin>>p>>a>>m>>r;
	tmp=0;
	while(r>0){
		if(m>=p){
			r-=m;
			tmp++;
			
		}
		else if(p>m){
			if(p>m){
				r-=p;
				p=p-a;
				tmp++;
				
			}
			else if(p<=m){
				r-=m;
				tmp++;
				p-=a;
				
			}
		}
	}
	if(r<0){
		tmp-=1;
	}
	cout<<tmp<<endl;
}
}
