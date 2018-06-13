#include <iostream>
using namespace std;
int main(){
	int t,n,d,r;
	int x[100],y[100],z[100];
	cin>>t;
	while(t--){
		cin>>n>>d>>r;
		int a=0;
		for(int i=0; i<n; i++){
			cin>>x[i];
		}
		for(int i=0; i<n; i++){
			cin>>y[i];
		}
		for(int i=0; i<n; i++){
			z[i]=x[i]+y[i];
		}
		for(int i=0; i<n; i++){
			if(z[i]>d){
				z[i]=z[i]-d;
			}
			else{
				z[i]=0;
			}
		}
		for(int i=0; i<n; i++){
			a=a+z[i]*r;
		}
		cout<<a<<endl;
	}
}
