#include<bits/stdc++.h>

using namespace std;

struct compare {
    bool operator()(int a, int b) {
        return a > b;
    }
};

int main(){
	int tc; scanf("%d", &tc);
	while(tc--){
		int n, d, r; scanf("%d %d %d", &n, &d, &r);
		int x[n], y[n];
		for(int i = 0; i < n; i++) scanf("%d", &x[i]);
		sort(x, x + n);
		for(int i = 0; i < n; i++) scanf("%d", &y[i]);
		compare c;
		sort(x, x + n, c);
		/*for(int i = 0; i < n; i++) printf("%d ", x[i]);
		cout << "\n";
		for(int i = 0; i < n; i++) printf("%d ", y[i]);
		cout << "\n";*/
		int tot = 0;
		for(int i = 0; i < n; i++){
			if(d - x[i] - y[i] < 0) tot += x[i] + y[i] - d;
		}
		tot *= r;
		printf("%d\n", tot);
	}
	return 0;
}