#include<bits/stdc++.h>

using namespace std;

int main(){
	int tc; scanf("%d", &tc);
	while(tc--){
		int n, d, r; scanf("%d %d %d", &n, &d, &r);
		int x[n], y[n];
		for(int i = 0; i < n; i++) scanf("%d", &x[i]);
		for(int i = 0; i < n; i++) scanf("%d", &y[i]);
		int tot = 0;
		for(int i = 0; i < n; i++){
			if(d - x[i] - y[i] < 0) tot += x[i] + y[i] - d;
		}
		tot *= r;
		printf("%d\n", tot);
	}
	return 0;
}