#include<iostream>

using namespace std;

long long x[1005];

int main(){
	int n;
	cin>>n;
	for(int i=1;i<=1000;i++){
		x[i]=i*i;
	}
	while(n--){
		int a;
		cin>>a;
		for(int i=1000;i>=1;i--){
			//cout<<x[i]<<" "<<a<<endl;
			if(x[i]<=a){
				cout<<i<<endl;
				break;
			}
		}
	}
}