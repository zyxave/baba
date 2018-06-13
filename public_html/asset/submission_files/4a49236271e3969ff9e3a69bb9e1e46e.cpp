#include <bits/stdc++.h>
using namespace std;

int main(){
	int p,a,m,r,tmp,kasus,sampai;
	cin>>sampai;
	for(kasus=0;kasus<sampai;kasus++){
	cin>>p>>a>>m>>r;
	tmp=0;
	while(r>0){
		if(m>p||m==p){
			r-=m;
			tmp++;
			
		}
		else if(p>m){
			if(p-a>m){
				r-=p;
				p=p-a;
				tmp++;
				
			}
			else if(p-a<=m){
				r-=m;
				tmp++;
				p-=a;
				
			}
		}
	}
	cout<<tmp-1<<endl;
}
}
