#include <bits/stdc++.h>
using namespace std;

int main() {
	int tc; scanf("%d", &tc);
	while(tc--){
		int p, a, m, r;
		scanf("%d %d %d %d", &p, &a, &m, &r);
		int res = 0;
		while(r > 0){
			//if(p < r) break;
			r -= p;
			if(p - a > m){
				p -= a;
				res++;
			} else if(p - a <= m){
				p = m;
				res++;
			}
		} printf("%d\n", res - 1);
	}
}