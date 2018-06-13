#include <bits/stdc++.h>
using namespace std;

int T, l, r;
int arr[10005];

void isHate(int a){
	bitset<10>frek;
	
	int tmp = a;
	bool benci = 0;
	
	while(tmp>0 && !benci){
		int x = tmp%10;
		
		if(frek[x]) benci = 1;
		
		frek[x] = 1;
		tmp /= 10;
	}
	
	arr[a] = arr[a-1];
	if(benci){
		arr[a] += 1;
	}
}

bool benci(int a){
	bool frek[10];
	memset(frek,0,sizeof frek);
	bool ans = 0;
	
	while(a>0){
		if(frek[a%10]==1){
			ans = 1;
			break;
		}
		
		frek[a%10] = 1;
		a /= 10;
	}
	
	return ans;
}

int main(){
	memset(arr,0,sizeof arr);
	
	for(int i=1;i<=10000;i++) isHate(i);
	
	cin >> T;
	
	while(T--){
		cin >> l >> r;
		int ans = 0;
		//cout << arr[r]-arr[l-1] << endl;
		for(;l<=r;l++){
			if(benci(l)) ans++;
		}
		
		cout << ans << endl;
	}	
}
