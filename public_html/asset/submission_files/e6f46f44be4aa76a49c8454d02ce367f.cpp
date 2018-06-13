#include<bits/stdc++.h>
using namespace std;

vector<long long>ve;

void com(int ke,long long bil){
	if(ke==17){
		ve.push_back(bil);
	//	cout<<bil<<endl;
		return;
	}
	if(ke!=1)ve.push_back(bil);
	com(ke+1,bil*10+4);
	com(ke+1,bil*10+8);
}

int main(){
	int t;
	cin>>t;
	com(1,0);
	sort(ve.begin(),ve.end());
	for(int x = 0; x <= 10; x++){
	//	cout << ve[x] << "\n";
	}
	while(t--){
		long long n;
		cin>>n;
		long long jaw=lower_bound(ve.begin(),ve.end(),n)-ve.begin();
		cout<<ve[jaw]<<endl;
	}
}
