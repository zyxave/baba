#include<bits/stdc++.h>

using namespace std;

int main(){
	int tc; scanf("%d", &tc);
	while(tc--){
		int num; scanf("%d", &num);
		int res = floor(sqrt(num));
		printf("%d\n", res);
	}
}