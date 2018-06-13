#include<bits/stdc++.h>

using namespace std;

int main(){
	int tc; scanf("%d", &tc);
	while(tc--){
		int num; scanf("%d", &num);
		if(num <= 20){
			printf("%d\n", num);
			continue;
		}
		for(int i = 9; i > 1; i--){
			int res, lol = (i * 10) + 1;
			if(lol <= num){
				res = 10 + i + (num - lol) + 1;
				printf("%d\n", res);
				break;
			}
		}
	}
}