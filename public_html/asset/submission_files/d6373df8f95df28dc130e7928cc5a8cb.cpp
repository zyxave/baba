#include<bits/stdc++.h>
using namespace std;

int t,n;
string ini;


int main()
{
	scanf("%d",&t);
	while(t--)
	{
		scanf("%d",&n);
		cin >> ini;
		int bit = 1;
		int val = 0;
		for(int y = 0; y < n ;y++)
		{
			for(int x = (y + 1) * 8 - 1 ; x >= y * 8; x--)
			{	
				if(ini[x] == "P") val = val + bit;
				bit = bit * 2;
			}	
			bit = 1;
					
					printf("%c %d\n",val);
					val = 0;
		}
		
		printf("\n");
		
	}
}
