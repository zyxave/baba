#include <iostream>
using namespace std;

long kembalian(long x){
	long temp=0;
	if (x>100){
		temp=temp+x/100;
		x=x%100;
	}
	if (x>20){
		temp=temp+x/20;
		x=x%20;
	}
	if (x>5){
		temp=temp+x/5;
		x=x%5;
	}
	temp=temp+x/1;
	return temp;
}

int main(){
	long n, hasil; 
	long uang[1005], harga[1004], temp[1005];
	cin>>n;
	
	for (int i=1; i<=n; i++){
		cin>>uang[i]>>harga[i];
		temp[i]=uang[i]-harga[i];
	}
	for (int i=1; i<=n; i++){
		hasil=kembalian(temp[i]);
		cout<<hasil<<'\n';
	}
	cin>>n;
	return 0;
}