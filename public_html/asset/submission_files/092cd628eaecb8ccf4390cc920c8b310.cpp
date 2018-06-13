#include<bits/stdc++.h>

using namespace std;
int n, m, sel, ansa, ansb;
int x[10000], y[10000];
bool lis(int arr[]){
	bool ok = 0;
	int idx = 0;
	for(int i = 1; i < n; i++){
		for(int j = 0; j < i; j++){
			if(arr[i] + arr[j] == m){
				ok = 1;
				x[idx] = arr[j]; y[idx] = arr[i];
				idx++;
				if(sel > abs(arr[i] - arr[j])){
					sel = abs(arr[i] - arr[j]);
					ansa = min(arr[i], arr[j]);
					ansb = max(arr[i], arr[j]);
				}
			}		
		}
	}
	if (ok) return 1;
}
int main(){
	int tc; scanf("%d", &tc);
	while(tc--){
		sel = 1e9 + 7;
		scanf("%d %d", &n, &m);
		int arr[n];
		for(int i = 0; i < n; i++) scanf("%d", &arr[i]);
		bool cek = lis(arr);
		if(cek) printf("%d %d", ansa, ansb);
	}
}
