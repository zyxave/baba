#include <bits/stdc++.h>
using namespace std;

int main(){
	int kasus,sampai,n,d,r,ok,tmp;
	cin>>sampai;
	for(kasus=0;kasus<sampai;kasus++){
		cin>>n>>d>>r;
		int x[n],y[n],z[n];
		tmp=0;
		
		for(ok=0;ok<n;ok++){
			cin>>x[ok];
		}
		for(ok=0;ok<n;ok++){
			cin>>y[ok];
		}
		sort(x,x+n);
		sort(y,y+n,greater<int>());
		for(ok=0;ok<n;ok++){
			z[ok]=x[ok]+y[ok];
			if(z[ok]>d){
				z[ok]-=d;
				tmp+=z[ok];
			}
		}
		
		cout<<tmp*r<<endl;
	}
}
